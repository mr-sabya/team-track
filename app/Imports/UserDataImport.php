<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Visa;
use App\Models\Passport;
use App\Models\Vehicle;
use App\Models\DrivingLicense;
use App\Models\EmiratesInfo;
use App\Models\InsuranceInfo;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserDataImport implements ToCollection
{
    protected $companyId;

    // Constructor to accept companyId dynamically
    public function __construct($companyId)
    {
        $this->companyId = $companyId;
    }

    public function collection(Collection $collection)
    {
        $collection = $collection->skip(1);
        
        foreach ($collection as $row) {
            // Check if the user already exists by email, and filter by company_id
            $user = User::where('email', $row[2])
                ->where('company_id', $this->companyId)
                ->first();

            // If the user doesn't exist, create a new user
            if (!$user) {
                // Parse all the date fields upfront
                $dateOfBirth = $this->parseDate($row[4]);  // Date of Birth at index 4
                $visaIssueDate = $this->parseDate($row[7]);  // Visa issue date at index 7
                $visaExpiryDate = $this->parseDate($row[8]);  // Visa expiry date at index 8
                $passportIssueDate = $this->parseDate($row[10]);  // Passport issue date at index 10
                $passportExpiryDate = $this->parseDate($row[11]);  // Passport expiry date at index 11
                $vehicleIssueDate = $this->parseDate($row[13]);  // Vehicle issue date at index 13
                $vehicleExpiryDate = $this->parseDate($row[14]);  // Vehicle expiry date at index 14
                $drivingLicenseIssueDate = $this->parseDate($row[16]);  // Driving License issue date at index 16
                $drivingLicenseExpiryDate = $this->parseDate($row[17]);  // Driving License expiry date at index 17
                $emiratesExpiryDate = $this->parseDate($row[20]);  // Emirates expiry date at index 20
                $insuranceExpiryDate = $this->parseDate($row[23]);  // Insurance expiry date at index 23

                // Create the user
                $user = User::create([
                    'first_name' => $row[0],  // First Name at index 0
                    'last_name' => $row[1],  // Last Name at index 1
                    'email' => $row[2],      // Email at index 2
                    'password' => bcrypt($row[3]),  // Password at index 3
                    'date_of_birth' => $dateOfBirth,  // Date of Birth at index 4
                    'phone' => $row[5],  // Phone at index 5
                    'address' => $row[6], // Address at index 6
                    'company_id' => $this->companyId, // Dynamic company ID
                    'is_employee' => 1,  // Set as employee
                ]);

                // Create related models for this user

                // Visa
                Visa::create([
                    'user_id' => $user->id,
                    'issue_date' => $visaIssueDate,
                    'expiry_date' => $visaExpiryDate,
                ]);

                // Passport
                Passport::create([
                    'user_id' => $user->id,
                    'passport_no' => $row[9],  // Passport number at index 9
                    'issue_date' => $passportIssueDate,
                    'expiry_date' => $passportExpiryDate,
                ]);

                // Vehicle
                Vehicle::create([
                    'user_id' => $user->id,
                    'vehicle_no' => $row[12],  // Vehicle number at index 12
                    'issue_date' => $vehicleIssueDate,
                    'expiry_date' => $vehicleExpiryDate,
                ]);

                // Driving License
                DrivingLicense::create([
                    'user_id' => $user->id,
                    'driving_license_no' => $row[15],  // Driving License number at index 15
                    'issue_date' => $drivingLicenseIssueDate,
                    'expiry_date' => $drivingLicenseExpiryDate,
                ]);

                // Emirates Info
                EmiratesInfo::create([
                    'user_id' => $user->id,
                    'emirates_id_no' => $row[18],  // Emirates ID number at index 18
                    'card_no' => $row[19],  // Emirates card number at index 19
                    'expiry_date' => $emiratesExpiryDate,
                ]);

                // Insurance Info
                InsuranceInfo::create([
                    'user_id' => $user->id,
                    'insurance_no' => $row[21],  // Insurance number at index 21
                    'type_id' => (int)$row[22],  // Insurance type ID at index 22
                    'expiry_date' => $insuranceExpiryDate,
                ]);
            }
        }
    }


    private function parseDate($dateString)
    {
        try {
            // Try to parse the date, assuming it is in Y-m-d format
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString);

            // If the date format is valid, return the date
            return $date->format('Y-m-d'); // Return in a consistent format
        } catch (\Exception $e) {
            // If parsing fails, log the error and return null or a default value
            Log::error("Failed to parse date: " . $dateString);
            return null;  // Return null if the date cannot be parsed
        }
    }
}
