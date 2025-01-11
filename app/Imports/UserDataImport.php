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
     /**
     * Handle the collection of rows.
     *
     * @param Collection $collection
     * @return void
     */
    public function collection(Collection $collection)
    {
        // Iterate over each row
        foreach ($collection as $row) {
            // Parse all date fields
            $dateOfBirth = $this->parseDate($row[7]);
            $visaIssueDate = $this->parseDate($row[12]);
            $visaExpiryDate = $this->parseDate($row[13]);
            $passportIssueDate = $this->parseDate($row[15]);
            $passportExpiryDate = $this->parseDate($row[16]);
            $vehicleIssueDate = $this->parseDate($row[18]);
            $vehicleExpiryDate = $this->parseDate($row[19]);
            $drivingLicenseIssueDate = $this->parseDate($row[21]);
            $drivingLicenseExpiryDate = $this->parseDate($row[22]);
            $emiratesExpiryDate = $this->parseDate($row[25]);
            $insuranceExpiryDate = $this->parseDate($row[28]);

            // Create the user record with the parsed and formatted dates
            $user = User::create([
                'first_name' => $row[0],
                'last_name' => $row[1],
                'company_id' => (int)$row[2],
                'email' => $row[3],
                'password' => bcrypt($row[5]),
                'country_id' => (int)$row[6],
                'date_of_birth' => $dateOfBirth,  // Parsed date_of_birth
                'gender' => (int)$row[8],
                'phone' => $row[9],
                'address' => $row[10],
                'is_employee' => 1,
            ]);

            // Save related models for this user with the parsed date fields
            Visa::create([
                'user_id' => $user->id,
                'issue_date' => $visaIssueDate,
                'expiry_date' => $visaExpiryDate,
            ]);

            Passport::create([
                'user_id' => $user->id,
                'passport_no' => $row[14],
                'issue_date' => $passportIssueDate,
                'expiry_date' => $passportExpiryDate,
            ]);

            Vehicle::create([
                'user_id' => $user->id,
                'vehicle_no' => $row[17],
                'issue_date' => $vehicleIssueDate,
                'expiry_date' => $vehicleExpiryDate,
            ]);

            DrivingLicense::create([
                'user_id' => $user->id,
                'driving_license_no' => $row[20],
                'issue_date' => $drivingLicenseIssueDate,
                'expiry_date' => $drivingLicenseExpiryDate,
            ]);

            EmiratesInfo::create([
                'user_id' => $user->id,
                'emirates_id_no' => $row[23],
                'card_no' => $row[24],
                'expiry_date' => $emiratesExpiryDate,
            ]);

            InsuranceInfo::create([
                'user_id' => $user->id,
                'insurance_no' => $row[26],
                'type_id' => (int)$row[27],
                'expiry_date' => $insuranceExpiryDate,
            ]);
        }
    }

    /**
     * Helper function to parse and format date fields.
     *
     * @param string|null $date
     * @return string|null
     */
    public function parseDate($date)
    {
        // Trim spaces and check if it's empty
        $date = trim($date);

        if (empty($date)) {
            return null;
        }

        try {
            // Try to parse the date using Carbon
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            Log::error('Invalid date format: ' . $date);
            return null; // Return null if invalid
        }
    }

}
