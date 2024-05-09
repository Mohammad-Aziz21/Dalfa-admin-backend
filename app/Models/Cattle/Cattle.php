<?php

    namespace App\Models\Cattle;

    use App\Models\User\User;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Cattle extends Model
    {
        use HasFactory;

        protected $table = 'cattles';

        protected $casts = [
            'is_active' => 'integer',
        ];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function images(): HasMany
        {
            return $this->hasMany(CattleImage::class);
        }

        public function videos(): HasMany
        {
            return $this->hasMany(CattleVideos::class);
        }
    }
