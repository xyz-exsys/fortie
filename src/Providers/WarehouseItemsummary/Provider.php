<?php namespace Wetcat\Fortie\Providers\WarehouseItemsummary;

/*

   Copyright 2015 Andreas Göransson

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.

*/

use Wetcat\Fortie\Providers\ProviderBase;
use Wetcat\Fortie\FortieRequest;

class Provider extends ProviderBase {

  protected $attributes = [
    'stockPointId',
    'stockPointCode',
    'stockPointName',
    'totalQuantity',
    'availableQuantity',
    'orderShortage',
    'stockLocations',
    'orderPointQuantity',
    'maxStock',
  ];


  protected $writeable = [];


  protected $required_create = [];


  protected $required_update = [];


  /**
   * Override the REST path
   */
  protected $basePath = 'warehouse/stockpoints-v1/itemsummary';


  /**
   * Retrieves the details of an article. You need to supply the unique 
   * article number that was returned when the article was created or 
   * retrieved from the list of articles.
   *
   * @param $id
   * @return array
   */
  public function find ($id)
  {
    $req = new FortieRequest();
    $req->versionPath = 'api';
    $req->method('GET');
    $req->path($this->basePath)->path($id);

    return $this->send($req->build());
  }

}
