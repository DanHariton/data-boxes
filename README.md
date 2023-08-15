# Czech Data Box

https://info.mojedatovaschranka.cz/info/cs/

## Installation

1. add to your `composer.json`

``` 
"repositories": [
  {
    "url": "https://github.com/DanHariton/data-boxes.git",
    "type": "git"
  }
 ]
```

2. `composer require danhariton/data-boxes`

## Usage

* Use [`\DanHariton\DataBoxes\Service\DataBoxInterface::loadData(string $ico): array`](./src/Service/DataBoxInterface.php) to get information about data box by VAT (IČO).
