<?php

namespace Tests\Feature;

use App\Models\City;
use Tests\TestCase;

class CityResourceTest extends TestCase
{
    public function testCanShowDataTablePage()
    {
        $response = $this->actingAs($this->user)->get(route('city.index'));
        $response->assertStatus(200);
        $response->assertViewIs('::cities.index');
    }

    public function testCanShowCreateCityForm()
    {
        $response = $this->actingAs($this->user)->get(route('city.create'));
        $response->assertStatus(200);
        $response->assertViewIs('::cities.create');
    }

    public function testCanStoreNewCity()
    {
        $city = factory(City::class)->make();
        $response = $this->actingAs($this->user)->post(route('city.store'), $city->toArray());

        $response->assertSessionHasNoErrors();

        $response->assertStatus(302);

        $this->assertDatabaseHas('cities', $city->toArray());
        $response->assertRedirect(route('city.index'));
    }

    public function testCanShowCityDetailPage()
    {
        $city = factory(City::class)->create();
        $response = $this->actingAs($this->user)->get(route('city.show', $city));
        $response->assertStatus(200);
        $response->assertViewIs('::cities.show');
    }

    public function testCanShowUpdateCityForm()
    {
        $city = factory(City::class)->create();
        $response = $this->actingAs($this->user)->get(route('city.edit', $city));

        $response->assertSessionHasNoErrors();

        $response->assertStatus(200);
        $response->assertViewIs('::cities.edit');
    }

    public function testCanUpdateCity()
    {
        $city = factory(City::class)->create();
        $newData = factory(City::class)->make();
        $response = $this->actingAs($this->user)->put(route('city.update', $city), $newData->toArray());

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
        $this->assertDatabaseHas('cities', $newData->toArray());
        $response->assertRedirect(route('city.index'));
    }

    public function testCanDeleteCity()
    {
        $city = factory(City::class)->create();
        $response = $this->actingAs($this->user)->delete(route('city.destroy', $city));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('cities', $city->toArray());

        $response->assertRedirect(route('city.index'));
    }
}
