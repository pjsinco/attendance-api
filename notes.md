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
