# PHP AngoUtils

AngoUtils é um pacote do composer que agiliziza bastante a forma que você desenvolve em PHP.
Contendo recursos específicos para o contexto angolano.

## Instalação 
Você pode instalar AngoUtils via Composer
``` 
composer require angoutils/angoutils
````
## Funcionalidades

 - Validação de Números do BI
 - Validação de Números de Telefone
 - Validação de NIF
 - Formatação de Moeda
 - Formatação de Datas
 - Formatação de números de telefone
 - Listagem de Provincias, capitais, municipios e código ISO
 - Filtro de Provincias

## Utilização

### Validando o número de Bilhete

```php
<?php 
    use AngoUtils\AngoUtils;

    $validated = AngoUtils::validateIDNumber("00569822LA087");
    if($validated){
        echo "Bilhete  válido";
    }else{
        echo "Bilhete inválido";
    }
?>
```
Retorna TRUE se validado ou FALSE se não.

Nota: Esta função não verifica se o número do bilhete existe. Apenas verifica se o formato está de acordo com o padrão exigido.

### Formatando número de Telefone

```php 
<?php 
    use AngoUtils\AngoUtils;

    $number = "943148227"
    $validated_number = AngoUtils::formatPhoneNumber($number);

?>
```
#### Output:
```
 +244 943-148-227
```
Se pretender apenas o número sem o código +244, basta passar um boleano false como segundo parametro na chamada da função formatPhoneNumber()

```php 
<?php 
    use AngoUtils\AngoUtils;

    $number = "943148227"
    $validated_number = AngoUtils::formatPhoneNumber($number, false);

?>
```
#### Output:
```
943-148-227
```
### Formatando Datas

```php 
<?php 
    use AngoUtils\AngoUtils;
    
    $foundation_date = AngoUtils::formatDate('12-01-2003');
    echo "Nossa empresa foi fundada em ".$foudation_date;
    
?>
```
##### Output:
````
A nossa empresa foi fundada em 12 Jan. 2003
```` 
## Formatação de moeda
```php 
<?php 
    use AngoUtils\AngoUtils;

    $preco = AngoUtils::formatCurrency("1250");
    echo "O item custa ".$preco;

?>
```
#### Output:
```
 O item custa 1 250,00 kz
```

## Validando número de Telefone

```php 
<?php 
    use AngoUtils\AngoUtils;
    
    $number = "943148227";
    $validated = AngoUtils::validatePhoneNumber($number);
    if($validated){
        echo "número válido";
    }else{
        echo "número inválido";
    }
?>
```
Retorna TRUE se validado ou FALSE se não.

## Listagem de Provincias, capitais, municipios e código ISO

A função getAllProvinces() retorna um array associativo, contendo os nomes das provincias, capitais, código ISO e seus municípios.

```php
<?php
    use AngoUtils\AngoUtils;

    $provinces = AngoUtils::getAllProvinces();
    var_dump($provinces);
?>
```
## Filtrando Província
A função getProvince() espera receber como parâmetro o código ISO da provincia que pretende buscar. Uma vez informado, ela procura qual provincia tem o código ISO correspondente, e a retorna na forma de array.
```php
<?php
    use AngoUtils\AngoUtils;
    $province = AngoUtils::getProvince("LUA");

    var_dump($province);
?>
```