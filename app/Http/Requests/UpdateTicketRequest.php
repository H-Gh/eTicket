<?php
/**
 * The request for updating tickets
 * PHP version 7.4
 *
 * @category Request
 * @package  App\Http\Requests
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Http\Requests;

use App\Facades\TicketManager;
use App\Ticket;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateTicketRequest
 *
 * @category Request
 * @package  App\Http\Requests
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class UpdateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()->can("ticket.edit.content")) {
            return true;
        }
        if ($this->hasAny(["title", "text", "created_by", "created_at"])) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "nullable",
            "text" => "nullable|min:10",
            "answer" => "nullable",
            "status" => [
                "required",
                Rule::in([Ticket::PENDING, Ticket::REJECTED, Ticket::ANSWERED])
            ],
            "assigned_to" => "nullable|exists:App\User,id",
            "answered_at" => "nullable|date",
            "answered_by" => "nullable|exists:App\User,id"
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            "title" => __("common.Title"),
            "text" => __("common.Text")
        ];
    }
}
