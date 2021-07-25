# formatter
各種変換ユーティリティ

## Install

利用するプロジェクトの `composer.json` に以下を追加する。
```composer.json
"repositories": {
    "formatter": {
        "type": "vcs",
        "url": "https://github.com/shimoning/formatter.git"
    }
},
```

その後以下でインストールする。

```bash
composer install shimoning/formatter
```

## Usage
### 時間系
#### number2clock
数値を `n:mm` 形式にする。
数値に `分` を入れれば `h:mm` として、`秒` を入れれば `m:ss` として利用できる。
`:` より前の値は 3桁以上になりうる。

```php
Time::number2clock(100); // -> 1:40
```

第2引数には時間を分けるための文字を設定可能。
デフォルトでは `:` となっている。

```php
Time::number2clock(100, '-'); // -> 1-40
```

#### clock2number
`n:mm` 形式の文字列を数値にする。
`number2clock` の逆。

```php
Time::clock2number('1:40'); // -> 100
```

第2引数には時間を分けるための文字を設定可能。
デフォルトでは `:` となっている。

```php
Time::clock2number('1-40', '-'); // -> 100
```

### SQL 関連
#### sanitizeTextForSearchQuery
前方一致や後方一致を安全に行うための文字列サニタイザ。

```php
Sql::sanitizeTextForSearchQuery('%test'); // -> \%test
```
