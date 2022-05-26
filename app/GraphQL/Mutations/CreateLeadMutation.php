<?

namespace App\GraphQL\Mutations;

use Closure;
use App\Models\Lead;
use GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Mutation;

class CreateLeadMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createLead'
    ];

    public function type(): Type
    {
        return Type::nonNull(GraphQL::type('Lead'));
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string())
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string())
            ],
            'phone' => [
                'name' => 'phone',
                'type' => Type::nonNull(Type::string())
            ],
            'wantToBuy' => [
                'name' => 'wantToBuy',
                'type' => Type::nonNull(Type::boolean())
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $lead = Lead::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'phone' => $args['phone'],
            'wantToBuy' => $args['wantToBuy'],
        ]);
        $lead->save();
        return $lead;
    }
}
