<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 *
 * @category Ticket
 * @package  App\Frontend\Controller
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 * @mixin    Eloquent
 */
class Ticket extends Model
{
    public const PENDING = "pending";
    public const ANSWERED = "answered";
    public const REJECTED = "rejected";

    protected $fillable = ["title", "text", "created_by"];
}
