<?php

namespace App;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * Retrive all the user models. Used for seeding.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function retrieveUsers()
    {
        $users = User::all();

        return $users;
    }

    /**
     * Retrive all the user's CV models..
     *
     * @return mixed
     */
    public function retrieveCVs()
    {
        $cvs = CV::where('user_id',$this->id)->get();

        return $cvs;
    }

    /**
     * One-to-many relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cvs()
    {
        return $this->hasMany(CV::class);
    }

    /**
     * One-to-many relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    /**
     * One-to-many relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * One-to-many relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hobbies()
    {
        return $this->hasMany(Hobby::class);
    }

    /**
     * One-to-many relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * One-to-many relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    /**
     * One-to-many relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    /**
     * One-to-many relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function templates()
    {
        return $this->hasMany(Template::class);
    }
}
