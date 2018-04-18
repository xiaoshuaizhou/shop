<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Profile
 *
 * @property int $id
 * @property string $truename
 * @property int|null $age
 * @property string $sex
 * @property string|null $birthday
 * @property string $nickname
 * @property string $company
 * @property int $userid
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $status
 * @property string $phone
 * @property string|null $website
 * @property string|null $detailaddress
 * @property string|null $province
 * @property string|null $city
 * @property int|null $postcode
 * @property string|null $mark
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereDetailaddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereTruename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereUserid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Profile whereWebsite($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = ['id','truename','age','sex','birthday','nickname','company','userid','created_at','updated_at','status','phone','website', 'detailaddress', 'province', 'city', 'postcode', 'mark'];
}
