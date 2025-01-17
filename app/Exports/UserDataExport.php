<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Visa;
use App\Models\Passport;
use App\Models\Vehicle;
use App\Models\DrivingLicense;
use App\Models\EmiratesInfo;
use App\Models\InsuranceInfo;
use Maatwebsite\Excel\Concerns\FromArray;

class UserDataExport implements FromArray
{
    /**
     * Returns an array of data to be exported.
     *
     * @return array
     */
    public function array(): array
    {
        return [
            [
                'first_name',
                'last_name',
                'email',
                'password',
                'date_of_birth',
                'phone',
                'address',
                'visa_issue_date',
                'visa_expiry_date',
                'passport_no',
                'passport_issue_date',
                'passport_expiry_date',
                'vehicle_no',
                'vehicle_issue_date',
                'vehicle_expiry_date',
                'driving_license_no',
                'driving_license_issue_date',
                'driving_license_expiry_date',
                'emirates_id_no',
                'emirates_card_no',
                'emirates_expiry_date',
                'insurance_no',
                'insurance_type_id',
                'insurance_expiry_date'
            ],
            // Sample data rows
            [
                'John',
                'Doe',
                'john.doe@example.com',
                'password123',
                '1990-01-01',
                '1234567890',
                '123 Main St, City',
                '2025-01-01',
                '2026-01-01',
                'A1234567',
                '2025-01-01',
                '2030-01-01',
                'ABC123',
                '2025-01-01',
                '2026-01-01',
                'DL12345',
                '2025-01-01',
                '2030-01-01',
                '123456789',
                '987654321',
                '2026-01-01',
                'INS12345',
                1,
                '2026-01-01'
            ],
            [
                'Jane',
                'Smith',
                'jane.smith@example.com',
                'password456',
                '1985-05-10',
                '0987654321',
                '456 Oak St, Town',
                '2025-02-01',
                '2026-02-01',
                'B2345678',
                '2025-02-01',
                '2030-02-01',
                'DEF456',
                '2025-02-01',
                '2026-02-01',
                'DL67890',
                '2025-02-01',
                '2030-02-01',
                '987654321',
                '123456789',
                '2026-02-01',
                'INS67890',
                1,
                '2026-02-01'
            ],
            [
                'Sam',
                'Brown',
                'sam.brown@example.com',
                'password789',
                '1992-03-15',
                '1122334455',
                '789 Pine St, Village',
                '2025-03-01',
                '2026-03-01',
                'C3456789',
                '2025-03-01',
                '2030-03-01',
                'GHI789',
                '2025-03-01',
                '2026-03-01',
                'DL11223',
                '2025-03-01',
                '2030-03-01',
                '987654320',
                '123456780',
                '2026-03-01',
                'INS11223',
                1,
                '2026-03-01'
            ]
        ];
    }
}
