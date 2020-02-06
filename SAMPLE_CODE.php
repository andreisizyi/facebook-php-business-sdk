<?php
/**
 * Copyright (c) 2015-present, Facebook, Inc. All rights reserved.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

require __DIR__ . '/vendor/autoload.php';

use FacebookAds\Object\AdAccount;
use FacebookAds\Object\AdsInsights;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;

$access_token = 'EAACeZCTpoOxUBAMD09ZA1Ksodbk5nPELhVzOS9ZB8Me9ZAZCIAJM2QrVwYwsZAGBQZBU34GtatZCUytut3z5qvdK2RcxRucppXJAhzf3ZC7rkfTOKGcjVnQvGpgeRWvZCUsdFWby3mzD4ZCCdMpafcZCyTmSIo99KvtuH2N5Uzba5zwVjwZDZD';
$ad_account_id = 'act_1550232035126856';
$app_secret = 'b74058625a2b1cb56d8e47debdfdfda7';
$app_id = '174810443823893';

$api = Api::init($app_id, $app_secret, $access_token);
$api->setLogger(new CurlLogger());


$fields = array(
  'account_name',
  'account_id',
  'impressions',
  'objective',
   /*'clicks',*/
   'actions',
   'spend',
  /*'outbound_clicks',
  'cpc',
  'cost_per_conversion',*/
);
$params = array(
	'level' => 'account',
	'breakdowns' => array(),
	'time_range' => array('since' => date("y-m-d"),'until' => date("y-m-d")),
);

echo json_encode((new AdAccount($ad_account_id))->getInsights(
  $fields,
  $params
)->getResponse()->getContent(), JSON_PRETTY_PRINT);