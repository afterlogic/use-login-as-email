<?php
/**
 * @copyright Copyright (c) 2017, Afterlogic Corp.
 * @license AGPL-3.0 or AfterLogic Software License
 *
 * This code is licensed under AGPLv3 license or AfterLogic Software License
 * if commercial version of the product was purchased.
 * For full statements of the licenses see LICENSE-AFTERLOGIC and LICENSE-AGPL3 files.
 */
class_exists('CApi') or die();

class CUseLoginAsEmailPlugin extends AApiPlugin
{
	/**
	 * @param CApiPluginManager $oPluginManager
	 */
	public function __construct(CApiPluginManager $oPluginManager)
	{
		parent::__construct('1.0', $oPluginManager);

		$this->AddHook('api-integrator-login-to-account', 'PluginIntegratorLoginToAccount');
	}
	
	/**
	 * @param string $sEmail
	 * @param string $sPassword
	 * @param string $sLogin
	 * @param string $sLanguage
	 * @param bool $bAuthResult
	 */
	public function PluginIntegratorLoginToAccount(&$sEmail, &$sPassword, &$sLogin, &$sLanguage, &$bAuthResult)
	{
		if (0 === strlen($sEmail))
		{
			$sEmail = $sLogin;
		}
	}
}

return new CUseLoginAsEmailPlugin($this);
