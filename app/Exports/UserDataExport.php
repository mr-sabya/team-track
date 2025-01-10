<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

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
            ['first_name', 'last_name', 'company_id', 'email', 'email_verified_at', 'password', 'country_id', 'date_of_birth', 'gender', 'phone', 'address', 'is_employee', 'visa_issue_date', 'visa_expiry_date', 'passport_no', 'passport_issue_date', 'passport_expiry_date', 'vehicle_no', 'vehicle_issue_date', 'vehicle_expiry_date', 'driving_license_no', 'driving_license_issue_date', 'driving_license_expiry_date', 'emirates_id_no', 'emirates_card_no', 'emirates_expiry_date', 'insurance_no', 'insurance_type_id', 'insurance_expiry_date'],
            ['John', 'Doe', 1, 'john.doe@example.com', '2025-01-10', 'secretpassword', 1, '1990-01-01', 'Male', '1234567890', 'Some Address', 1, '2025-01-01', '2026-01-01', 'A1234567', '2025-01-01', '2030-01-01', 'ABC123', '2025-01-01', '2026-01-01', 'DL123', '2025-01-01', '2030-01-01', '123456789', '987654321', '2026-01-01', 'INS123', 1, '2026-01-01'],
            ['Jane', 'Smith', 2, 'jane.smith@example.com', '2025-01-10', 'anotherpassword', 1, '1985-05-10', 'Female', '0987654321', 'Another Address', 0, '2025-02-01', '2026-02-01', 'B2345678', '2025-02-01', '2030-02-01', 'DEF456', '2025-02-01', '2026-02-01', 'DL456', '2025-02-01', '2030-02-01', '987654321', '123456789', '2026-02-01', 'INS456', 2, '2026-02-01'],
        ];
    }
}
