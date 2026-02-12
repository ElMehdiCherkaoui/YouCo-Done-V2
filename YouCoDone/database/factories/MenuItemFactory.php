<?php

namespace Database\Factories;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemFactory extends Factory
{
    protected $model = MenuItem::class;

    public function definition(): array
    {
        $moroccanItems = [
            // Tagines (Traditional Slow-Cooked Stews)
            ['title' => 'Tagine de Poulet aux Olives et Citron', 'description' => 'Chicken tagine with preserved lemons and green olives'],
            ['title' => 'Tagine d\'Agneau aux Pruneaux', 'description' => 'Tender lamb with sweet prunes and warm spices'],
            ['title' => 'Tagine de Boeuf aux Amandes', 'description' => 'Beef tagine with toasted almonds and apricots'],
            ['title' => 'Tagine de Poisson aux Tomates', 'description' => 'Fresh fish with tomatoes, onions, and coriander'],
            ['title' => 'Tagine de Poulet aux Abricots', 'description' => 'Chicken with dried apricots and warming spices'],
            ['title' => 'Tagine de Légumes', 'description' => 'Vegetarian tagine with seasonal vegetables and herbs'],
            ['title' => 'Tagine de Poisson aux Fruits de Mer', 'description' => 'Mixed seafood tagine with fennel and saffron'],
            ['title' => 'Tagine de Poulet à la Menthe', 'description' => 'Chicken with fresh mint and green peas'],
            ['title' => 'Tagine d\'Agneau aux Dates', 'description' => 'Lamb with Medjool dates and cinnamon'],
            ['title' => 'Tagine de Boeuf aux Raisins', 'description' => 'Beef with raisins and ginger'],
            ['title' => 'Tagine de Poisson à l\'Ail', 'description' => 'Fish with garlic, paprika, and cilantro'],
            ['title' => 'Tagine de Poulet aux Noix', 'description' => 'Chicken with walnuts and pomegranate'],
            ['title' => 'Tagine d\'Agneau aux Oignons', 'description' => 'Lamb with caramelized onions and raisins'],
            ['title' => 'Tagine de Boeuf à la Cannelle', 'description' => 'Beef with cinnamon, honey, and almonds'],
            ['title' => 'Tagine de Calamars', 'description' => 'Tender squid with tomatoes and bell peppers'],
            ['title' => 'Tagine de Crevettes', 'description' => 'Shrimp with preserved lemons and olives'],
            ['title' => 'Tagine d\'Agneau aux Champignons', 'description' => 'Lamb with mushrooms and cumin'],
            ['title' => 'Tagine de Poulet aux Epinards', 'description' => 'Chicken with spinach and ginger'],
            ['title' => 'Tagine de Boeuf aux Carottes', 'description' => 'Beef with carrots and cilantro'],
            ['title' => 'Tagine de Poisson aux Olives Noires', 'description' => 'Fish with black olives and tomato sauce'],

            // Couscous Dishes
            ['title' => 'Couscous aux Sept Légumes', 'description' => 'Traditional couscous with seven vegetables and chickpeas'],
            ['title' => 'Couscous à l\'Agneau', 'description' => 'Couscous with tender lamb and seasonal vegetables'],
            ['title' => 'Couscous au Poulet', 'description' => 'Fluffy couscous with chicken and caramelized onions'],
            ['title' => 'Couscous au Boeuf', 'description' => 'Couscous with beef and root vegetables'],
            ['title' => 'Couscous aux Fruits de Mer', 'description' => 'Couscous with shrimp, fish, and squid'],
            ['title' => 'Couscous Végétarien', 'description' => 'Garden vegetables with chickpeas and almonds'],
            ['title' => 'Couscous à la Merguez', 'description' => 'Spiced sausage with couscous and caramelized onions'],
            ['title' => 'Couscous aux Raisins Secs', 'description' => 'Couscous with dried fruit and pine nuts'],
            ['title' => 'Couscous Sucré aux Dates', 'description' => 'Sweet couscous with dates and cinnamon'],
            ['title' => 'Couscous à l\'Escargot', 'description' => 'Snails with couscous and cilantro sauce'],
            ['title' => 'Couscous aux Truffes', 'description' => 'Luxury couscous with desert truffles'],
            ['title' => 'Couscous au Poisson Grillé', 'description' => 'Grilled fish with light couscous'],
            ['title' => 'Couscous à l\'Ail', 'description' => 'Roasted garlic couscous with vegetables'],
            ['title' => 'Couscous aux Amandes Grillées', 'description' => 'Couscous with toasted almonds and apricots'],
            ['title' => 'Couscous au Gingembre', 'description' => 'Fresh ginger-infused couscous'],

            // Pastillas (Phyllo Pastries)
            ['title' => 'Pastilla au Poulet', 'description' => 'Crispy pastry with chicken, eggs, and almonds'],
            ['title' => 'Pastilla aux Fruits de Mer', 'description' => 'Seafood pastilla with saffron and herbs'],
            ['title' => 'Pastilla à l\'Agneau', 'description' => 'Lamb pastilla with cinnamon and sesame'],
            ['title' => 'Pastilla aux Légumes', 'description' => 'Vegetarian pastilla with spinach and cheese'],
            ['title' => 'Pastilla au Pigeon', 'description' => 'Traditional pigeon pastilla with almonds'],
            ['title' => 'Pastilla Sucrée aux Dattes', 'description' => 'Sweet pastilla with dates and honey'],
            ['title' => 'Pastilla aux Amandes et Miel', 'description' => 'Crispy pastilla with almonds and local honey'],
            ['title' => 'Pastilla au Poisson', 'description' => 'Flaky pastilla with fresh white fish'],

            // Briouats (Savory Pastries)
            ['title' => 'Briouats aux Amandes', 'description' => 'Phyllo triangles with ground almonds and cinnamon'],
            ['title' => 'Briouats à la Viande', 'description' => 'Meat-filled phyllo pastry triangles'],
            ['title' => 'Briouats au Fromage', 'description' => 'Cheese and herb-filled briouats'],
            ['title' => 'Briouats à la Merguez', 'description' => 'Spiced sausage briouats'],
            ['title' => 'Briouats aux Légumes', 'description' => 'Vegetable-filled pastry triangles'],
            ['title' => 'Briouats aux Crevettes', 'description' => 'Shrimp and herb briouats'],
            ['title' => 'Briouats au Miel', 'description' => 'Sweet honey-glazed briouats'],
            ['title' => 'Briouats aux Oeufs', 'description' => 'Hard-boiled eggs in phyllo pastry'],

            // Salads (Ensaladas)
            ['title' => 'Salade Marocaine', 'description' => 'Fresh tomatoes, cucumbers, onions with cilantro and lime'],
            ['title' => 'Salade Méchouia', 'description' => 'Roasted peppers, tomatoes, onions with olive oil'],
            ['title' => 'Salade de Carottes Râpées', 'description' => 'Shredded carrots with orange juice and cumin'],
            ['title' => 'Salade de Betteraves', 'description' => 'Roasted beets with cumin and orange'],
            ['title' => 'Salade de Chou', 'description' => 'Cabbage salad with vinegar and spices'],
            ['title' => 'Salade d\'Aubergines', 'description' => 'Smoky eggplant puree with herbs'],
            ['title' => 'Salade de Poivrons', 'description' => 'Charred peppers with garlic and cilantro'],
            ['title' => 'Salade de Tomates Séchées', 'description' => 'Sun-dried tomatoes with preserved lemon'],
            ['title' => 'Salade Verte aux Herbes', 'description' => 'Mixed greens with Moroccan herbs'],
            ['title' => 'Salade de Concombre', 'description' => 'Cool cucumber with mint and lime'],
            ['title' => 'Salade aux Fruits', 'description' => 'Mixed fruit salad with orange blossom water'],
            ['title' => 'Salade de Pois Chiches', 'description' => 'Chickpea salad with cumin and cilantro'],
            ['title' => 'Salade de Lentilles', 'description' => 'Warm lentil salad with vegetables'],
            ['title' => 'Salade d\'Olives', 'description' => 'Marinated olives with lemon and herbs'],
            ['title' => 'Salade Acidulée', 'description' => 'Sweet and sour vegetable salad'],

            // Soups (Soupes)
            ['title' => 'Harira Traditionnelle', 'description' => 'Rich tomato soup with meat, chickpeas, and lentils'],
            ['title' => 'Harira Végétarienne', 'description' => 'Vegetarian harira with herbs and spices'],
            ['title' => 'Chorba', 'description' => 'Spiced soup with meat and vegetables'],
            ['title' => 'Shorba aux Pois Chiches', 'description' => 'Chickpea soup with cilantro and cumin'],
            ['title' => 'Soupe à l\'Oignon', 'description' => 'Caramelized onion soup with bread'],
            ['title' => 'Soupe aux Légumes', 'description' => 'Seasonal vegetable soup'],
            ['title' => 'Soupe de Poisson', 'description' => 'Fresh fish soup with herbs'],
            ['title' => 'Soupe aux Lentilles', 'description' => 'Creamy lentil soup with cumin'],

            // Grilled Meats (Grillades)
            ['title' => 'Brochettes d\'Agneau', 'description' => 'Grilled lamb skewers with cumin and paprika'],
            ['title' => 'Brochettes de Boeuf', 'description' => 'Beef kebabs with herbs and spices'],
            ['title' => 'Brochettes de Poulet', 'description' => 'Marinated chicken skewers'],
            ['title' => 'Merguez Grillée', 'description' => 'Spiced lamb sausage grilled over coals'],
            ['title' => 'Kefta Grillée', 'description' => 'Grilled minced meat with herbs'],
            ['title' => 'Côtes d\'Agneau Grillées', 'description' => 'Lamb chops with rosemary and lemon'],
            ['title' => 'Côtes de Boeuf', 'description' => 'Grilled beef ribs with cumin'],
            ['title' => 'Poulet Grillé Entier', 'description' => 'Whole grilled chicken with spices'],
            ['title' => 'Poisson Grillé', 'description' => 'Fresh grilled fish with herbs'],
            ['title' => 'Crevettes Grillées', 'description' => 'Grilled shrimp with garlic and lemon'],
            ['title' => 'Foie Grillé', 'description' => 'Grilled liver with cilantro'],
            ['title' => 'Rognons Grillés', 'description' => 'Grilled kidneys with spices'],
            ['title' => 'Méchoui', 'description' => 'Slow-roasted lamb with cumin'],
            ['title' => 'Pigeon Grillé', 'description' => 'Grilled pigeon with herbs'],

            // Tajines (Alternative spellings)
            ['title' => 'Tajine de Carottes et Oignons', 'description' => 'Carrots and onions with cumin'],
            ['title' => 'Tajine de Courges', 'description' => 'Squash with spices and cilantro'],
            ['title' => 'Tajine de Champignons', 'description' => 'Mushrooms with garlic and herbs'],
            ['title' => 'Tajine aux Fruits Secs', 'description' => 'Mixed dried fruits with meat'],

            // Breads (Pains)
            ['title' => 'Pain Marocain', 'description' => 'Traditional Moroccan bread from wood oven'],
            ['title' => 'Khobz', 'description' => 'Daily round bread with seeds'],
            ['title' => 'Pain aux Olives', 'description' => 'Bread studded with green olives'],
            ['title' => 'Amlou', 'description' => 'Almond and honey spread for bread'],
            ['title' => 'Msemen', 'description' => 'Flaky layered bread with butter'],
            ['title' => 'Rghaif', 'description' => 'Stuffed pastry bread with meat or vegetables'],
            ['title' => 'Batbout', 'description' => 'Pancake-like bread with herbs'],
            ['title' => 'Mella', 'description' => 'Thin crepe-style bread'],

            // Fish & Seafood
            ['title' => 'Poisson aux Amandes', 'description' => 'Fish topped with toasted almonds'],
            ['title' => 'Poisson à la Chermoula', 'description' => 'Fish with cilantro and garlic marinade'],
            ['title' => 'Calamars Farcis', 'description' => 'Stuffed squid with herbs and spices'],
            ['title' => 'Poulpe à la Marocaine', 'description' => 'Octopus with tomatoes and cilantro'],
            ['title' => 'Crevettes à la Chermoula', 'description' => 'Marinated shrimp with cilantro'],
            ['title' => 'Moules Marinières', 'description' => 'Mussels in white wine and herbs'],
            ['title' => 'Huîtres Grillées', 'description' => 'Grilled oysters with lemon'],
            ['title' => 'Coquilles Saint-Jacques', 'description' => 'Scallops in butter and herbs'],
            ['title' => 'Poisson Farci aux Légumes', 'description' => 'Whole fish stuffed with vegetables'],
            ['title' => 'Daurade Royale Grillée', 'description' => 'Grilled sea bream with herbs'],

            // Vegetarian Dishes
            ['title' => 'Tajine de Courges et Pois Chiches', 'description' => 'Squash and chickpea tagine'],
            ['title' => 'Ratatouille Marocaine', 'description' => 'Seasonal vegetables with cumin and cilantro'],
            ['title' => 'Pois Chiches à la Chermoula', 'description' => 'Chickpeas with cilantro sauce'],
            ['title' => 'Lentilles aux Épinards', 'description' => 'Lentils with spinach and garlic'],
            ['title' => 'Aubergines aux Tomates', 'description' => 'Eggplant and tomato stew'],
            ['title' => 'Carottes à la Marocaine', 'description' => 'Carrots with cumin and cilantro'],
            ['title' => 'Poivrons Farcis', 'description' => 'Peppers stuffed with rice and herbs'],
            ['title' => 'Courgettes aux Herbes', 'description' => 'Zucchini with fresh Moroccan herbs'],
            ['title' => 'Haricots aux Oignons', 'description' => 'Beans with caramelized onions'],
            ['title' => 'Artichauts à la Marocaine', 'description' => 'Artichokes with garlic and cilantro'],

            // Offals & Traditional
            ['title' => 'Tête de Mouton', 'description' => 'Slow-cooked lamb head - traditional delicacy'],
            ['title' => 'Tripes à la Marocaine', 'description' => 'Tripe stew with chickpeas and spices'],
            ['title' => 'Langue de Boeuf', 'description' => 'Beef tongue with sauce'],
            ['title' => 'Saucisse Marocaine', 'description' => 'Spiced sausage with herbs'],
            ['title' => 'Andouille', 'description' => 'Traditional Moroccan offal sausage'],

            // Rice Dishes
            ['title' => 'Riz à l\'Espagnol', 'description' => 'Rice with seafood and saffron'],
            ['title' => 'Riz aux Légumes', 'description' => 'Rice with seasonal vegetables'],
            ['title' => 'Riz à la Viande', 'description' => 'Rice with meat and spices'],
            ['title' => 'Riz aux Fruits Secs', 'description' => 'Rice with dried fruit and almonds'],

            // Appetizers (Entrées)
            ['title' => 'Hummus aux Pignons', 'description' => 'Chickpea dip with pine nuts'],
            ['title' => 'Baba Ganoush', 'description' => 'Smoky eggplant puree with tahini'],
            ['title' => 'Kemia Mixte', 'description' => 'Mixed appetizers platter'],
            ['title' => 'Crevettes Farcies', 'description' => 'Stuffed shrimp with herbs'],
            ['title' => 'Escargots à la Marocaine', 'description' => 'Snails with cilantro and garlic'],
            ['title' => 'Fromage de Chèvre Rôti', 'description' => 'Warm goat cheese with honey'],
            ['title' => 'Oeufs Mimosa', 'description' => 'Deviled eggs with paprika'],
            ['title' => 'Artichauts Poêlés', 'description' => 'Sautéed artichoke hearts'],

            // Desserts (Desserts)
            ['title' => 'Tajine Sucré aux Fruits Secs', 'description' => 'Sweet tagine with dried fruits and honey'],
            ['title' => 'Baklava Marocaine', 'description' => 'Phyllo pastry with almonds and honey'],
            ['title' => 'Makrout', 'description' => 'Date-filled semolina cookies'],
            ['title' => 'Cornes de Gazelle', 'description' => 'Gazelle horn pastries with almond filling'],
            ['title' => 'Chebakia', 'description' => 'Honey-soaked cookie with sesame'],
            ['title' => 'Kouign Amann Marocain', 'description' => 'Caramelized pastry with honey'],
            ['title' => 'Flan au Miel', 'description' => 'Honey flan with caramel'],
            ['title' => 'Crème Brûlée à l\'Orange', 'description' => 'Orange blossom crème brûlée'],
            ['title' => 'Pâte de Fruits', 'description' => 'Fruit paste jellies'],
            ['title' => 'Gâteau Mille-feuille', 'description' => 'Thousand layer pastry cake'],
            ['title' => 'Gâteau au Chocolat et Amandes', 'description' => 'Chocolate and almond cake'],
            ['title' => 'Pâtisserie Marocaine', 'description' => 'Assorted Moroccan pastries'],
            ['title' => 'Amandes Caramélisées', 'description' => 'Candied almonds'],
            ['title' => 'Poudre d\'Amandes', 'description' => 'Ground almonds with sugar'],
            ['title' => 'Nougat Marocain', 'description' => 'Honey and almond nougat'],

            // Beverages (Boissons)
            ['title' => 'Thé à la Menthe', 'description' => 'Moroccan mint tea with green tea'],
            ['title' => 'Café Marocain', 'description' => 'Strong coffee with cardamom'],
            ['title' => 'Jus d\'Orange Frais', 'description' => 'Fresh orange juice'],
            ['title' => 'Jus de Citron', 'description' => 'Fresh lemon juice with mint'],
            ['title' => 'Jus de Grenade', 'description' => 'Pomegranate juice'],
            ['title' => 'Jus de Banane', 'description' => 'Fresh banana juice'],
            ['title' => 'Café au Lait', 'description' => 'Coffee with milk'],
            ['title' => 'Eau de Fleur d\'Oranger', 'description' => 'Orange blossom water drink'],
            ['title' => 'Horchata Marocaine', 'description' => 'Almond milk drink'],
            ['title' => 'Karkade', 'description' => 'Hibiscus flower tea'],
            ['title' => 'Thé aux Amandes', 'description' => 'Almond tea'],
            ['title' => 'Café Turc', 'description' => 'Turkish coffee with spices'],

            // Special Dishes
            ['title' => 'Rfissa', 'description' => 'Shredded msemen with lentil soup'],
            ['title' => 'Bstilla Sucrée aux Dattes', 'description' => 'Sweet pastilla with dates'],
            ['title' => 'Seffa Nouilles Sucrée', 'description' => 'Sweet vermicelli with cinnamon'],
            ['title' => 'Bessara', 'description' => 'Fava bean soup with cilantro'],
            ['title' => 'Tanjia', 'description' => 'Marrakchi slow-cooked meat in clay pot'],
            ['title' => 'Kefta bil Tomata', 'description' => 'Meatballs in tomato sauce'],
            ['title' => 'Kefta bil Baid', 'description' => 'Meatballs with eggs'],
            ['title' => 'Pastilla aux Oeufs', 'description' => 'Pastilla with scrambled eggs'],
            ['title' => 'Dafina', 'description' => 'Overnight slow-cooked stew with meat'],
            ['title' => 'M\'hanncha', 'description' => 'Spiral pastry with almond paste'],
            ['title' => 'Loukoum Marocain', 'description' => 'Moroccan Turkish delight'],
            ['title' => 'Caramel aux Cacahuètes', 'description' => 'Peanut brittle'],
            ['title' => 'Pignons Grillés', 'description' => 'Roasted pine nuts'],
            ['title' => 'Dattes Farcies', 'description' => 'Stuffed dates with almonds'],
            ['title' => 'Miel et Amandes', 'description' => 'Local honey with almonds'],
        ];

        return $this->faker->randomElement($moroccanItems);
    }
}