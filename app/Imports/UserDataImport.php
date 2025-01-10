<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Visa;
use App\Models\Passport;
use App\Models\Vehicle;
use App\Models\DrivingLicense;
use App\Models\EmiratesInfo;
use App\Models\InsuranceInfo;
use Illuminate\Support\Collection;
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
        foreach ($collection as $row) {
            // Assuming the columns are in the correct order as shown before
            $user = User::create([
                'first_name' => $row[0],
                'last_name' => $row[1],
                'company_id' => $row[2],
                'email' => $row[3],
                'email_verified_at' => $row[4],
                'password' => bcrypt($row[5]),
                'country_id' => $row[6],
                'date_of_birth' => $row[7],
                'gender' => $row[8],
                'phone' => $row[9],
                'address' => $row[10],
                'is_employee' => $row[11],
            ]);

            // Save related models for this user
            Visa::create([
                'user_id' => $user->id,
                'issue_date' => $row[12],
                'expiry_date' => $row[13],
            ]);

            Passport::create([
                'user_id' => $user->id,
                'passport_no' => $row[14],
                'issue_date' => $row[15],
                'expiry_date' => $row[16],
            ]);

            Vehicle::create([
                'user_id' => $user->id,
                'vehicle_no' => $row[17],
                'issue_date' => $row[18],
                'expiry_date' => $row[19],
            ]);

            DrivingLicense::create([
                'user_id' => $user->id,
                'driving_license_no' => $row[20],
                'issue_date' => $row[21],
                'expiry_date' => $row[22],
            ]);

            EmiratesInfo::create([
                'user_id' => $user->id,
                'emirates_id_no' => $row[23],
                'card_no' => $row[24],
                'expiry_date' => $row[25],
            ]);

            InsuranceInfo::create([
                'user_id' => $user->id,
                'insurance_no' => $row[26],
                'type_id' => $row[27],
                'expiry_date' => $row[28],
            ]);
        }
    }
}
