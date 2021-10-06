<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class news extends Model
{
    protected $table = 'tb_news';
    protected $primaryKey = 'new_id';

    public function new_numberformat($num = null, $precision = 1)
    {
        if ($num < 900) {
            $n_format = number_format($num, $precision);
            $suffix = '';
        } else if ($num < 900000) {
            $n_format = number_format($num / 1000, $precision);
            $suffix = 'K';
        } else if ($num < 900000000) {
            $n_format = number_format($num / 1000000, $precision);
            $suffix = 'M';
        } else if ($num < 900000000000) {
            $n_format = number_format($num / 1000000000, $precision);
            $suffix = 'B';
        } else {
            $n_format = number_format($num / 1000000000000, $precision);
            $suffix = 'T';
        }
        if ( $precision > 0 ) {
            $dotzero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotzero, '', $n_format );
        }
        return $n_format . $suffix;
    }

    public function rating($type = null)
    {
        $rating = Comment::where('comment_type', $type)->where('comment_object_id', $this->new_id)->sum('comment_rating');
        return $rating / 5;
    }

    public function count_like($type = null)
    {
        $like = Comment::where('comment_type', $type)->where('comment_object_id', $this->new_id)->sum('comment_like');
        return $like;
    }

    public function count_dislike($type = null)
    {
        $dislike = Comment::where('comment_type', $type)->where('comment_object_id', $this->new_id)->sum('comment_dislike');
        return $dislike;
    }

    /**
     * Get all of the Content_hasM_Tags for the news
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Content_hasM_Tags($type = null)
    {
        return $this->hasMany(tag::class, 'tag_fkey', 'new_id')->where('tag_type', $type)->get();
    }
}
