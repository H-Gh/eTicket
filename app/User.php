<?php
/**
 * The User Model
 * PHP version PHP 7.4
 *
 * @category Model
 * @package  App
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App;

use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @category Model
 * @package  App
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 * @mixin    Eloquent
 * @property string name
 * @property string email
 * @property string email_verified_at
 * @property string password
 * @property string remember_token
 * @property string created_at
 * @property string updated_at
 * @property array  tickets
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The relation between tickets and user
     *
     * @return HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, "id", "created_by");
    }
}
