
protected $fillable = [
    'name',
    'description',
    'duration',
    'fee',
    'difficulty',
    'is_active',
];

protected function casts(): array
{
    return [
        'is_active' => 'boolean',
        'fee' => 'decimal:2',
    ];
}