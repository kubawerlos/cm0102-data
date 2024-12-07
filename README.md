# CM0102: data

[![Latest stable version](https://img.shields.io/packagist/v/kubawerlos/cm0102-data.svg?label=current%20version)](https://packagist.org/packages/kubawerlos/cm0102-data)
[![License](https://img.shields.io/github/license/kubawerlos/cm0102-data.svg)](LICENSE)

Data based on game data of Championship Manager 01/02.

## Installation
```bash
composer require kubawerlos/cm0102-data
```

## Usage examples
```php
<?php
\CM0102Data\Nations::getNameForCode('ENG');
// returns 'England'

\CM0102Data\Nations::getCodeByName('Wales');
// returns 'WAL'

\CM0102Data\Clubs::getLongNameAndNationForShortName('Dortmund');
// returns ['BV Borussia Dortmund', 'Germany']

\CM0102Data\Clubs::getLongNameForShortNameAndNation('ASA', 'Brazil');
// returns 'Agremiação Sportiva Arapiraquense'

\CM0102Data\Clubs::getLongNameForShortNameAndNation('ASA', 'Romania');
// returns 'ASA Tîrgu Mures'
```
