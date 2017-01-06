<?php

namespace App\Jobs;

use App\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\Geocoder\Google\Geocoder;

class GeocodeAddressJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Address
     */
    private $address;

    /**
     * Create a new job instance.
     *
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * Execute the job.
     *
     * @param Geocoder $geocoder
     */
    public function handle(Geocoder $geocoder)
    {
        $street_label = $this->address->street_label;
        $street_detail = $this->address->street_detail;
        $zipcode = $this->address->zipcode;
        $city = $this->address->city;
        $country = $this->address->country;

        $full_address = $street_label . ', ' . $street_detail . ', ' . $zipcode . ', ' . $city . ', ' . $country;

        $geodata = $geocoder->getCoordinatesForQuery($full_address);

        if (is_array($geodata)) {
            if (isset($geodata['lat']) && isset($geodata['lng'])) {
                $this->address->update([
                    'lat' => $geodata['lat'],
                    'lng' => $geodata['lng'],
                ]);
            }
        }

    }
}
