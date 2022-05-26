<?

namespace App\GraphQL\Types;

use App\Models\Lead;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LeadType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Lead',
        'description'   => 'Заявка',
        'model'         => Lead::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'id заявки'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'имя клиента'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'email клиента'
            ],
            'phone' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'телефон клиента'
            ],
            'wantToBuy' => [
                'type' => Type::boolean(),
                'description' => 'желает ли купить'
            ]
        ];
    }

    // You can also resolve a field by declaring a method in the class
    // with the following format resolve[FIELD_NAME]Field()
    protected function resolveEmailField($root, array $args)
    {
        return strtolower($root->email);
    }
}
