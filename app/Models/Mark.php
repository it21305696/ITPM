<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'semester',
        'document_type',
        'group_id',
        'student1_it_no',
        'student1_grade',
        'student2_it_no',
        'student2_grade',
        'student3_it_no',
        'student3_grade',
        'student4_it_no',
        'student4_grade',
    ];

    /**
     * Define valid document types for each semester.
     *
     * @return array
     */
    public static function validDocumentTypesBySemester($semester)
    {
        $validDocumentTypes = [];

        if ($semester === 'semester1') {
            $validDocumentTypes = [
                'Proposal',
                'Progress 1',
                'Status document 1',
                'Proposal document',
            ];
        } elseif ($semester === 'semester2') {
            $validDocumentTypes = [
                'Progress 2',
                'Final',
                'Topic assessment form',
                'Project charter',
                'Logbook',
                'Status document 2',
                'Final thesis',
                'Website', // Assuming this is a valid document type for semester 2
            ];
        }

        return $validDocumentTypes;
    }

    /**
     * Check if a document type is valid for the specified semester.
     *
     * @param string $documentType
     * @param string $semester
     * @return bool
     */
    public static function isValidDocumentType($documentType, $semester)
    {
        $validDocumentTypes = self::validDocumentTypesBySemester($semester);
        return in_array($documentType, $validDocumentTypes);
    }

    /**
     * Assign grades based on the selected semester and document type.
     *
     * @param string $documentType
     * @param int $studentNumber
     * @return string
     */
    public static function assignGrade($documentType, $studentNumber)
    {
        $grades = [
            'semester1' => [
                'Proposal' => 'grade1',
                'Progress 1' => 'grade2',
                'Status document 1' => 'grade3',
                'Proposal document' => 'grade4',
            ],
            'semester2' => [
                'Progress 2' => 'grade5',
                'Final' => 'grade6',
                'Topic assessment form' => 'grade7',
                'Project charter' => 'grade8',
                'Logbook' => 'grade9',
                'Status document 2' => 'grade10',
                'Final thesis' => 'grade11',
                'Website' => 'grade12', // Assuming this is a valid document type for semester 2
            ],
        ];

        return $grades[$studentNumber][$documentType] ?? '';
    }

    // Optional: Define any additional model logic or relationships here
}
