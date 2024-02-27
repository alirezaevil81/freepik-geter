<p align="center"><a href="https://freepik.com" target="_blank"><img src="https://content.pstmn.io/b06daa51-6d2f-4e8d-9eb1-e11799acec78/RnJlZXBpa19QcmltYXJ5X2xvZ29fUGlraUJsdWVfMDEucG5n" width="250" alt="Laravel Logo"></a></p>

<p align="center">
<img alt="PHP " src="https://img.shields.io/badge/PHP--Guzzle-4F5B93">
<img alt="license Mit" src="https://img.shields.io/badge/license-Mit-green">

</p>

# freepik-geter

## 📸 Get photos and vectors and.... from the Freepik site


### Api : Made by 🔗[API Freepik](https://docs.freepik.com/).

### Options :

---
| Options            | Description                                                        |
|--------------------|--------------------------------------------------------------------|
| resources          | Get a list of resources paginated by different filters             |
| resources-detail   | Get a list of resources paginated by different filters             |
| resources-download | Download a resource                                                |
| resources-download-by-format | Download a specific format of a resource by its id and format type |
| plan | Get the details of the plan the developer has                      |
| plan-usage | Get the plan usage by developer                                    |
| icons | Get a list of icons paginated by different filters.                |
| icon-detail | Get icon detail                                                    |
| icons-download | Download icon                                                      |

### how to use

---

1.install: `composer require alirezaevil81/freepik-geter`

2.signup or login www.freepik.com and get your api key on www.freepik.com/api

3.Create an object using your unique API key:

```php
$freepik = new FreepikAPi("YOUR_API_KEY");
```

#### for example :

Get 4 resources from page one according to the word `"car"` and apply other filters and display them in the output

```php
$freepik->resources(1, 'car', 4, 'random')->orientation(true)->quickEdit(false)->choice(false)->contentType(true)->people(true,false,4)->request()->showResources();
```

Save the `jpg` image in the `img` folder
```php
$freepik->resourceDownloadByFormat('13240356', 'jpg')->request()->getResourceByFormat('img');
```

