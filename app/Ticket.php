<?php
/**
 * The Ticket Model
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

use Auth;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Ticket
 *
 * @category Model
 * @package  App
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 * @mixin    Eloquent
 * @property int    id
 * @property string title
 * @property string text
 * @property string answer
 * @property string status
 * @property User   assignedTo
 * @property int    assigned_to
 * @property User   answeredBy
 * @property int    answered_by
 * @property string answered_at
 * @property User   createdBy
 * @property int    created_by
 * @property string created_at
 * @property string updated_at
 */
class Ticket extends Model
{
    public const PENDING = "pending";
    public const ANSWERED = "answered";
    public const REJECTED = "rejected";

    protected $fillable = ["title", "text", "answer", "status"];

    protected $casts = [
        "answered_at" => "datetime"
    ];

    /**
     * This method will update a ticket to answered status
     *
     * @param string $answer The answer of Ticket
     *
     * @return bool
     */
    public function answered(?string $answer): bool
    {
        $currentUser = Auth::user()->getAuthIdentifier();
        $this->answer = $answer;
        if (empty($this->assigned_to)) {
            $this->assigned_to = $currentUser;
        }
        $this->answered_at = date("Y-m-d H:i:s");
        $this->answered_by = $currentUser;
        $this->status = self::ANSWERED;
        return $this->save();
    }

    /**
     * The relation between user and ticket
     *
     * @return BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * The relation between user and ticket
     *
     * @return BelongsTo
     */
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

    /**
     * The relation between user and ticket
     *
     * @return BelongsTo
     */
    public function answeredBy()
    {
        return $this->belongsTo(User::class, 'answered_by', 'id');
    }

    /**
     * Check what if a ticket has answered_at property or not
     *
     * @return bool
     */
    public function alreadyAnswered(): bool
    {
        return !empty($this->answered_at);
    }
}
