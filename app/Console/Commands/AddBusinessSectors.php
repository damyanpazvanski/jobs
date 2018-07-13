<?php

namespace App\Console\Commands;

use App\BusinessSector;
use Illuminate\Console\Command;

class AddBusinessSectors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'business-sectors:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $businessSectors = [
        'Accounting, Audit, Finance',
        'Administrative and office',
        'Advertising, PR',
        'Agricultures, Forestry &amp; Fishing',
        'Architecture, Construction',
        'Arts, Entertainment, Promotion',
        'Automotive, Auto Service, Gas Stations',
        'Aviation, Airport &amp; Airline',
        'Banking, Lending',
        'Beauty, SPA &amp; Salon',
        'Business/Consultancy services',
        'Cleaning, Household services',
        'Contact centers (Call centers)',
        'Design, Creative, Video &amp; Animation',
        'Drivers, Couriers',
        'Education, Courses, Translators',
        'Energy and Utilities',
        'Engineers',
        'Healthcare and pharmacy',
        'Hotels',
        'Human Resources',
        'Installation, Maintenance and Repair',
        'Insurance',
        'IT - Administration and sales',
        'IT - Hardware design/maintenance',
        'IT - Software development/maintenance',
        'Legal',
        'Management, Business development',
        'Manual work',
        'Manufacturing -  Electronics, Electrical, Mechanical',
        'Manufacturing - Chemistry and Oil',
        'Manufacturing - Food and Beverage',
        'Manufacturing - Furniture and Carpentry',
        'Manufacturing - Pharmaceutical',
        'Manufacturing - Textile and Clothes',
        'Manufacturing - Мetallurgy and Mining',
        'Manufacturing - Other',
        'Marine and Shipping',
        'Marketing',
        'Media, Publishing',
        'NGO',
        'Public sector, Government',
        'Real-estate',
        'Research and development',
        'Restaurants and Catering',
        'Retail, Wholesale',
        'Security',
        'Sports, Kinesiotherapy',
        'Telecommunications - Administration and sales',
        'Telecommunications - engineers and technicians',
        'Transport, Logistics, Spedition',
        'Travel and Tourism'
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

        foreach ($this->businessSectors as $businessSector) {
            BusinessSector::firstOrNew([
                'name' => $businessSector
            ])->save();
        }

        $this->info('------------------------- FINISHED -------------------------');
    }
}
