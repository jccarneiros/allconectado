<?php

namespace App\Models\Dashboard\Configurations;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dashboard\Configurations\Configuration
 *
 * @property int $id
 * @property string $app_name
 * @property string $app_email
 * @property string $app_cep
 * @property string $app_endereco
 * @property string $app_numero
 * @property string $app_bairro
 * @property string $app_cidade
 * @property string $app_estado
 * @property string|null $app_site
 * @property string|null $app_telefone_um
 * @property string|null $app_telefone_dois
 * @property string|null $app_telefone_tres
 * @property string $app_autor
 * @property string|null $app_image
 * @property string $app_url
 * @property string $app_debug
 * @property string $app_env
 * @property string $app_description
 * @property string $session_lifetime
 * @property string $session_expire_on_close
 * @property string $session_encrypt
 * @property int $app_enable_register
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppAutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppBairro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppDebug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppEnableRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppEnv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppTelefoneDois($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppTelefoneTres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppTelefoneUm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereAppUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereSessionEncrypt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereSessionExpireOnClose($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereSessionLifetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Configuration whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Configuration extends Model
{
    protected $guard = ['auth'];

    protected $table = 'configurations';

    protected $fillable = [
        'app_name',
        'app_email',
        'app_cep',
        'app_endereco',
        'app_numero',
        'app_bairro',
        'app_cidade',
        'app_estado',
        'app_site',
        'app_telefone_um',
        'app_telefone_dois',
        'app_telefone_tres',
        'app_autor',
        'app_image',
        'app_url',
        'app_debug',
        'app_env',
        'app_description',
        'session_lifetime',
        'session_expire_on_close',
        'session_encrypt',
        'app_enable_register',
    ];

    public function getImageConfiguration()
    {
        return $this->app_image;
    }
}
