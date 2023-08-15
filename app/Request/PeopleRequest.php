<?php

declare(strict_types=1);
/**
 * This file is part of OpenCodeCo.
 *
 * @link     https://github.com/opencodeco/rinha-de-backend-2023-q3
 * @document https://github.com/opencodeco/rinha-de-backend-2023-q3/wiki
 * @contact  https://github.com/opencodeco/rinha-de-backend-2023-q3/discussions
 * @license  https://github.com/opencodeco/rinha-de-backend-2023-q3/blob/dev/LICENSE
 */

namespace App\Request;

use Hyperf\Validation\Request\FormRequest;

class PeopleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @see https://github.com/zanfranceschi/rinha-de-backend-2023-q3/blob/main/INSTRUCOES.md#cria%C3%A7%C3%A3o-de-pessoas
     */
    public function rules(): array
    {
        return [
            'apelido' => 'required|size:32',
            'nome' => 'required|size:100',
            'nascimento' => 'required|date_format:Y-m-d',
        ];
    }
}
