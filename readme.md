<p align="center">API REST Setup & Repostory pattern</p>

<p align="center">
nothing to put
</p>


## License

Without License
<ul>
<li>first install the project with composer</li>
<li> generate --> php artisan key:generate if is not generated </li>
<li>show or reconfigure the file grumphp.yml</li>
<li>execute artisan migrate plz refer to https://laravel.com/docs/5.4/passport</li>
<li>php artisan passport:keys</li>
<li>execute artisan passport:install  </li>
</ul>


<h2> working with Repositories </h2>
To create a new Repository refer to exemple CountryRepository :
this class must extend from Baserepository and must redifine the <strong>model</strong> function to inject the model
wanted.
<br>
<ul>
<li> create a new controller : php artisant make:controller --resource</li>
<li> inject you repository in construct </li>
<li> create route in routes\api.php like this :Route::resource('countries', 'Api\CountryController'); </li>
</ul>
<br>
Also you can create a spécifique criteria and use it on extra, for that refer to App\Repositories\Criteria\
and App\Repositories\CountryRepository
<br>
you can push teh new criteria on <strong>initRepository</strong> or in the controller by using thsi method below <br>
<strong>pushCriteria</strong><br>
<strong>getByCriteria</strong><br>
...

#Request Criteria :
<h2>filters</h2>
exemple :<br>
?filters[columnname]=value --> for simple usage <br>
?filter[relation.columnname]= value --> for filter with relation.
 <h2>limit & offset</h2>
 use it simple juste put limit & offset on url.
 <h2>orderBy</h2>
 exemple :<br>
 ?orderBy[columnname]=value --> for simple usage <br>
 ?orderBy[relation.columnname]= value --> for filter with relation. --> we make the join for you.
 <h2>controller exemple</h2>
$inlineCount =  $this->countryRepository->pushCriteria(App::make('\App\Repositories\Criteria\RequestCriteria'))->count();
        $results = $this->countryRepository->pushCriteria(App::make('\App\Repositories\Criteria\RequestCriteria'))
            ->pushCriteria(App::make('\App\Repositories\Criteria\PagerCriteria'))
            ->with(['users'])
            ->lists();<br>
        return Response::json(compact('inlineCount', 'results'));




