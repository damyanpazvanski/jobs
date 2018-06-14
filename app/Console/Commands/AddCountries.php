<?php

namespace App\Console\Commands;

use App\Company;
use Illuminate\Console\Command;

class AddCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'countries:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add all countries in the countires table';

    protected $countries = [
        'Afghanistan',
        'Albania',
        'Algeria',
        'Andorra',
        'Angola',
        'Anguilla',
        'Antigua and Barbuda',
        'Argentina',
        'Armenia',
        'Australia',
        'Austria',
        'Azerbaijan',
        'Bahamas',
        'Bahrain',
        'Bangladesh',
        'Barbados',
        'Belarus',
        'Belgium',
        'Belize',
        'Benin',
        'Bermuda',
        'Bhutan',
        'Bolivia',
        'Bosnia and Herzegovina',
        'Botswana',
        'Brazil',
        'Brunei Darussalam',
        'Bulgaria',
        'Burkina Faso',
        'Burundi',
        'Cambodia',
        'Cameroon',
        'Canada',
        'Cape Verde',
        'Cayman Islands',
        'Central African Republic',
        'Chad',
        'Chile',
        'China',
        'Colombia',
        'Comoros',
        'Congo',
        'Costa Rica',
        'Croatia',
        'Cuba',
        'Cyprus',
        'Czech Republic',
        'Democratic Republic of the Congo',
        'Denmark',
        'Djibouti',
        'Dominica',
        'Dominican Republic',
        'Ecuador',
        'Egypt',
        'El Salvador',
        'Equatorial Guinea',
        'Eritrea',
        'Estonia',
        'Ethiopia',
        'Fiji',
        'Finland',
        'France',
        'French Guiana',
        'Gabon',
        'Gambia',
        'Georgia',
        'Germany',
        'Ghana',
        'Great Britain',
        'Greece',
        'Grenada',
        'Guadeloupe',
        'Guatemala',
        'Guinea',
        'Guinea-Bissau',
        'Guyana',
        'Haiti',
        'Honduras',
        'Hungary',
        'Iceland',
        'India',
        'Indonesia',
        'Iran',
        'Iraq',
        'Israel and the Occupied Territories',
        'Italy',
        'Ivory Coast (Cote d\'Ivoire)',
        'Jamaica',
        'Japan',
        'Jordan',
        'Kazakhstan',
        'Kenya',
        'Kosovo',
        'Kuwait',
        'Kyrgyz Republic (Kyrgyzstan)',
        'Laos',
        'Latvia',
        'Lebanon',
        'Lesotho',
        'Liberia',
        'Libya',
        'Liechtenstein',
        'Lithuania',
        'Luxembourg Republic of Macedonia',
        'Madagascar',
        'Malawi',
        'Malaysia',
        'Maldives',
        'Mali',
        'Malta',
        'Martinique',
        'Mauritania',
        'Mauritius',
        'Mayotte',
        'Mexico',
        'Moldova',
        'Monaco',
        'Mongolia',
        'Montenegro',
        'Montserrat',
        'Morocco',
        'Mozambique',
        'Myanmar/Burma',
        'Namibia',
        'Nepal',
        'Netherlands',
        'New Zealand',
        'Nicaragua',
        'Niger',
        'Nigeria',
        'Korea, Democratic Republic of (North Korea)',
        'Norway',
        'Oman',
        'Pacific Islands',
        'Pakistan',
        'Panama',
        'Papua New Guinea',
        'Paraguay',
        'Peru',
        'Philippines',
        'Poland',
        'Portugal',
        'Puerto Rico',
        'Qatar',
        'Reunion',
        'Romania',
        'Russian Federation',
        'Rwanda',
        'kitts-and-nevis/">Saint Kitts and Nevis',
        'Saint Lucia',
        'Saint Vincent\'s and Grenadines',
        'Samoa',
        'Sao Tome and Principe',
        'Saudi Arabia',
        'Senegal',
        'Serbia',
        'Seychelles',
        'Sierra Leone',
        'Singapore',
        'Slovak Republic (Slovakia)',
        'Slovenia',
        'Solomon Islands',
        'Somalia',
        'South Africa',
        'Korea, Republic of (South Korea)',
        'South Sudan',
        'Spain',
        'Sri Lanka',
        'Sudan',
        'Suriname',
        'Swaziland',
        'Sweden',
        'Switzerland',
        'Syria',
        'Tajikistan',
        'Tanzania',
        'Thailand',
        'Timor Leste',
        'Togo',
        'Trinidad and Tobago',
        'Tunisia',
        'Turkey',
        'Turkmenistan',
        'Turks and Caicos Islands',
        'Uganda',
        'Ukraine',
        'United Arab Emirates',
        'United States of America (USA)',
        'Uruguay',
        'Uzbekistan',
        'Venezuela',
        'Vietnam',
        'Virgin Islands (UK)',
        'Virgin Islands (US)',
        'Yemen',
        'Zambia',
        'Zimbabwe'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('------------------------- START ADDING -------------------------');

        foreach ($this->countries as $country) {
            Company::firstOrNew([
                'name' => $country
            ])->save();
        }

        $this->info('------------------------- FINISHED -------------------------');
    }
}
