<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (!function_exists('uploadImage')) {
    /**
     * Upload an image to the public folder.
     *
     * @param \Illuminate\Http\UploadedFile $image The uploaded image instance.
     * @param string $folder The folder name inside public/uploads (default: '').
     * @param string|null $oldImagePath Path to the old image for deletion (optional).
     * @return string|null The relative path to the uploaded image or null if no image is provided.
     */
    function uploadImage($image, $folder = '', $oldImagePath = null)
    {
        if (!$image) {
            return null;
        }

        // Generate a unique filename
        $fileName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();

        // Define the storage path
        $folderPath = $folder ? "public/{$folder}" : 'public';

        // Store the file in the specified folder
        $filePath = $image->storeAs($folderPath, $fileName);

        // Delete the old image if provided
        if ($oldImagePath && Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }

        // Return the relative file path (without 'public/')
        return str_replace('public/', '', $filePath);
    }
}
