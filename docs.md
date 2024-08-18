## Table of contents

- [\Ivuorinen\BusinessDataFetcher\BusinessDataFetcher](#class-ivuorinenbusinessdatafetcherbusinessdatafetcher)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyName](#class-ivuorinenbusinessdatafetcherdtobiscompanyname)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyForm](#class-ivuorinenbusinessdatafetcherdtobiscompanyform)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyBusinessIdChange](#class-ivuorinenbusinessdatafetcherdtobiscompanybusinessidchange)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisAddress](#class-ivuorinenbusinessdatafetcherdtobisaddress)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyBusinessLine](#class-ivuorinenbusinessdatafetcherdtobiscompanybusinessline)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyLanguage](#class-ivuorinenbusinessdatafetcherdtobiscompanylanguage)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyRegisteredEntry](#class-ivuorinenbusinessdatafetcherdtobiscompanyregisteredentry)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyLiquidation](#class-ivuorinenbusinessdatafetcherdtobiscompanyliquidation)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyRegisteredOffice](#class-ivuorinenbusinessdatafetcherdtobiscompanyregisteredoffice)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyDetails](#class-ivuorinenbusinessdatafetcherdtobiscompanydetails)
- [\Ivuorinen\BusinessDataFetcher\Dto\BisCompanyContactDetail](#class-ivuorinenbusinessdatafetcherdtobiscompanycontactdetail)
- [\Ivuorinen\BusinessDataFetcher\Exceptions\UnexpectedValueException](#class-ivuorinenbusinessdatafetcherexceptionsunexpectedvalueexception)
- [\Ivuorinen\BusinessDataFetcher\Exceptions\ApiResponseErrorException](#class-ivuorinenbusinessdatafetcherexceptionsapiresponseerrorexception)

<hr /><a id="class-ivuorinenbusinessdatafetcherbusinessdatafetcher"></a>

### Class: \Ivuorinen\BusinessDataFetcher\BusinessDataFetcher

> Fetches and returns business data from avoindata

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct()</strong> : <em>void</em><br /><em>BusinessDataFetcher constructor.</em> |
| public | <strong>getBusinessInformation(</strong><em>\string</em> <strong>$businessId</strong>)</strong> : <em>array</em><br /><em>Fetch Business Information.</em> |
| public | <strong>parseResponse(</strong><em>\Psr\Http\Message\ResponseInterface</em> <strong>$response</strong>)</strong> : <em>array</em><br /><em>Parse the response from the API.</em> |


<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanyname"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyName

> Company Name

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getSourceText()</strong> : <em>string</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanyform"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyForm

> Company Form

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getSourceText()</strong> : <em>string</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanybusinessidchange"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyBusinessIdChange

> Company Business Id Change

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getChangeString()</strong> : <em>string</em><br /><em>Get the description string of the change.</em> |
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getSourceText()</strong> : <em>string</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobisaddress"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisAddress

> Address

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getSourceText()</strong> : <em>string</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanybusinessline"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyBusinessLine

> Company Business Line

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getSourceText()</strong> : <em>string</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanylanguage"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyLanguage

> Company Language

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getSourceText()</strong> : <em>string</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanyregisteredentry"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyRegisteredEntry

> Company Registered Entry

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getAuthorityString()</strong> : <em>string</em><br /><em>Get the name of the authority.</em> |
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getRegisterString()</strong> : <em>string</em><br /><em>Get the name of the register.</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanyliquidation"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyLiquidation

> Company Liquidation

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getSourceText()</strong> : <em>string</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanyregisteredoffice"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyRegisteredOffice

> Company Registered Office

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getSourceText()</strong> : <em>string</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanydetails"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyDetails

> Company Details

| Visibility | Function |
|:-----------|:---------|


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherdtobiscompanycontactdetail"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Dto\BisCompanyContactDetail

> Company Contact Detail

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getLanguageString()</strong> : <em>string</em><br /><em>Get the language code as a string.</em> |
| public | <strong>getSourceText()</strong> : <em>string</em> |


*This class extends \Spatie\DataTransferObject\DataTransferObject*

<hr /><a id="class-ivuorinenbusinessdatafetcherexceptionsunexpectedvalueexception"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Exceptions\UnexpectedValueException

| Visibility | Function |
|:-----------|:---------|


*This class extends \Exception*

*This class implements \Throwable, \Stringable*

<hr /><a id="class-ivuorinenbusinessdatafetcherexceptionsapiresponseerrorexception"></a>

### Class: \Ivuorinen\BusinessDataFetcher\Exceptions\ApiResponseErrorException

| Visibility | Function |
|:-----------|:---------|


*This class extends \Exception*

*This class implements \Throwable, \Stringable*

