<?php
/**
 * The request for creating tickets
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

use App\Ticket;
use Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreTicketRequest
 *
 * @category Request
 * @package  App\Http\Requests
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class StoreTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->hasAny(
            ['status', 'answer', 'assigned_to', 'answered_by', 'answered_at']
        )
        ) {
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
            "title" => "required",
            "text" => "required|min:10",
            "status" => [
                "required",
                Rule::in([Ticket::PENDING, Ticket::REJECTED, Ticket::ANSWERED])
            ],
            "created_by" => "exists:App\User,id"
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


    /**
     * Get the validator instance for the request.
     *
     * @return Validator
     */
    protected function getValidatorInstance()
    {
        $data = $this->all();
        $data["created_by"] = Auth::user()->getAuthIdentifier();
        $data["status"] = Ticket::PENDING;
        $this->getInputSource()->replace($data);

        return parent::getValidatorInstance();
    }
}
