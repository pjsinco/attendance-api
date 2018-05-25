```sql
select
  sum(attendance), 
  strftime('%m', date_time, 'unixepoch', 'localtime') as month
from games
where 
  month = '04'
  and strftime('%y', date_time, 'unixepoch', 'localtime') = '2017'
  and home = 'kca'
group by month

select
  home,
  sum(attendance), 
  strftime('%Y', date_time, 'unixepoch', 'localtime') as year
from games
where 
  year = '2017'
group by home
```


```
sqlite3 -csv games.db "select home, sum(attendance), strftime('%Y', date_time, 'unixepoch', 'localtime') as year from games where year = '2017' group by home"

sqlite3 -csv games.db "select * from games" > games-`date +%Y-%m-%d`.csv

sqlite3 -csv /var/www/html/mlb-attendance/games.db "select * from games" > /var/www/html/attendance-api/database/data/games.csv
```


```php
App\Game::selectRaw("home, sum(attendance), strftime('%Y', date_time, 'unixepoch', 'localtime') as year from games where year = '2017' group by home")->get()

DB::table('games')->select(DB::raw("home, sum(attendance), strftime('%Y', date_time, 'unixepoch', 'localtime') as year"))->where(DB::raw("year = '2017'"))->get()

DB::table('games')->select(DB::raw("sum(attendance), strftime('%Y', date_time, 'unixepoch', 'localtime') as year"))->groupBy('year')->get();

DB::table('games')->select('home', 'attendance')->get()->sum('attendance');
```

##### Fri May 25 07:12:44 2018 CDT
Made this change:
> What solved the issue was doing this (from Laravel #19088):
In a text editor, open the file /Users/user/.composer/vendor/laravel/homestead/src/MakeCommand.php
Find and replace “default” with nothing (changing all of the “defaultName”s to “Name” throughout the file).
[Fatal error: Cannot redeclare static Symfony\Component\Console\Command\Command::$defaultName as non static ...](https://github.com/laravel/homestead/issues/841)
