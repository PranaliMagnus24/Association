<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $fillable = [
        'company','contact', 'email', 'address', 'job_title', 'job_desc', 'job_location',
        'vacancy', 'exp_req', 'category_id', 'subcategory_id',
        'skill', 'salary', 'status', 'upload_document','company_id',
    ];

    // Relationship: Job belongs to CompanyCategory
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship with CompanySubCategory
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
    public function countries()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }

    public function states()
    {
        return $this->belongsTo(State::class, 'state', 'id');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'city', 'id');
    }

    public function companyProfile()
    {
        return $this->belongsTo(CompanyPro::class,'company_id');
    }



}
