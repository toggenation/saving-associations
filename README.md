# Cakephp 4 - Save multiple levels of associated data

### Sample Data for Video

```php
$data = [
  'device_status_id' => '3',
  'name' => 'myDevice',
  'modules' => [
      [
         'name' => 'Autodetect',
         'module_state_id' => '1',
         'module_class_id' => '12',
         'module_type_id' => '4',
         'ports' => [
            [
              'physical_port' => '1',
              'port_unit_id' => '1',
              'port_identity' => '201901',
              'name' => 'Analog-1',
            ],
            [
              'physical_port' => '2',
              'port_unit_id' => '1',
              'port_identity' => '201902',
              'name' => 'Analog-2',
            ],
         ],
     ],
   ]
 ];

```

## Video Timings

```
00:45 Create a migration from sample post data
06:39 Bake the Devices, Modules, Ports MVC
08:00 Add saveAssociated Controller action and code to commit `$data` to database
10:19 Adding the options array to save associated data
12:49 Example of too much array nesting causing options to be ignored
13:54 Wasting time looking for 'accessibleFields' option in documentation
15:25 Using 'accessibleFields' to Changing Accessible Fields at run time
17:49 Trigger validation and viewing error array
18:07 Saving additional data to the join table. Array method
21:20 Adding _joinData using the Entity method
24:30 Linking existing data using _ids
```
