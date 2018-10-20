<?php

namespace App\Observers;

    use App\Scooter;

class ScooterObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \App\Scooter  $scooter
     * @return void
     */
    public function update(Scooter $scooter)
    {
        Switch($scooter->status)
        {
            case 'evaluating':
                $this->evaluateScooter($scooter);
                break;

            case 'checked out':
                $slot = $scooter->slot;
                $slot->status = 'available';
                $slot->save();
                break;
        }

    }

    private function evaluateScooter(Scooter $scooter)
    {
        // If charge under 50%, set status to charging

        // If battery over temp, set status to cooling

        // other wise

        $scooter->status = 'available';
        $scooter->save();
    }

}
