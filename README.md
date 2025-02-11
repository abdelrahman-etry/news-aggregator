# News Aggregator App

News Aggregator is a laravel application that pulls articles from various sources (`NewsAPI`, `The Guardian` and `New York Times`) and serves them to the frontend application.

## Usage

In order to fetch data from given sources run the following command

```bash
php artisan news:fetch
```

then you can run the application
```bash
php artisan serve
Server running on [http://127.0.0.1:8000]
```

* Get All News
```bash
http://127.0.0.1:8000/api/news
```

* Search News
```bash
http://127.0.0.1:8000/api/news?source=The Guardian
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.
