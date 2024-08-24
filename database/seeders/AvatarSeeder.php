<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $pokemon_gen1 = [
            "Bulbasaur", "Ivysaur", "Venusaur", "Charmander", "Charmeleon", "Charizard",
            "Squirtle", "Wartortle", "Blastoise", "Caterpie", "Metapod", "Butterfree",
            "Weedle", "Kakuna", "Beedrill", "Pidgey", "Pidgeotto", "Pidgeot",
            "Rattata", "Raticate", "Spearow", "Fearow", "Ekans", "Arbok",
            "Pikachu", "Raichu", "Sandshrew", "Sandslash", "Nidoran♀", "Nidorina",
            "Nidoqueen", "Nidoran♂", "Nidorino", "Nidoking", "Clefairy", "Clefable",
            "Vulpix", "Ninetales", "Jigglypuff", "Wigglytuff", "Zubat", "Golbat",
            "Oddish", "Gloom", "Vileplume", "Paras", "Parasect", "Venonat",
            "Venomoth", "Diglett", "Dugtrio", "Meowth", "Persian", "Psyduck",
            "Golduck", "Mankey", "Primeape", "Growlithe", "Arcanine", "Poliwag",
            "Poliwhirl", "Poliwrath", "Abra", "Kadabra", "Alakazam", "Machop",
            "Machoke", "Machamp", "Bellsprout", "Weepinbell", "Victreebel",
            "Tentacool", "Tentacruel", "Geodude", "Graveler", "Golem", "Ponyta",
            "Rapidash", "Slowpoke", "Slowbro", "Magnemite", "Magneton",
            "Farfetch'd", "Doduo", "Dodrio", "Seel", "Dewgong", "Grimer",
            "Muk", "Shellder", "Cloyster", "Gastly", "Haunter", "Gengar",
            "Onix", "Drowzee", "Hypno", "Krabby", "Kingler", "Voltorb",
            "Electrode", "Exeggcute", "Exeggutor", "Cubone", "Marowak",
            "Hitmonlee", "Hitmonchan", "Lickitung", "Koffing", "Weezing",
            "Rhyhorn", "Rhydon", "Chansey", "Tangela", "Kangaskhan",
            "Horsea", "Seadra", "Goldeen", "Seaking", "Staryu", "Starmie",
            "Mr. Mime", "Scyther", "Jynx", "Electabuzz", "Magmar", "Pinsir",
            "Tauros", "Magikarp", "Gyarados", "Lapras", "Ditto", "Eevee",
            "Vaporeon", "Jolteon", "Flareon", "Porygon", "Omanyte", "Omastar",
            "Kabuto", "Kabutops", "Aerodactyl", "Snorlax", "Articuno",
            "Zapdos", "Moltres", "Dratini", "Dragonair", "Dragonite",
            "Mewtwo", "Mew", "New Trainer", "Bear 1", "Bear 2", "Bear 3"
        ];

        $dataLength = count($pokemon_gen1);

        for($i=0; $i < $dataLength; $i++) {
            Avatar::create([
                "name" => $pokemon_gen1[$i],
                "image_path" => "assets/avatar/" . ($i + 1) . '.png',
            ]);
        }
    }
}
