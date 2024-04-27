<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Filters\CustomerFilter;
use App\Http\Resources\CustomerCollection;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;


/**
 * @OA\Info(
 *             title="API PetApi",
 *             version="1.0",
 *             description="Listado de URI's de la API para mascotas"
 * )
 *
 * @OA\Server(url="http://apirest.test")
 */


class CustomerController extends Controller
{
    /**
     * Lista todos los registros de Customers
     * @OA\Get (
     *     path="/api/v1/customers",
     *     tags={"Customer"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="Aderson Felix"
     *                     ),
     *                     @OA\Property(
     *                         property="email",
     *                         type="string",
     *                         example="malcolm@example.com"
     *                     ),
     *                     @OA\Property(
     *                         property="phone",
     *                         type="string",
     *                         example="832-226-9995"
     *                     ),
     *                     @OA\Property(
     *                         property="address",
     *                         type="string",
     *                         example="667 Wintheiser Ford"
     *                     ),
     *                     @OA\Property(
     *                         property="city",
     *                         type="string",
     *                         example="South Esperanza"
     *                     ),
     *                     @OA\Property(
     *                         property="postalCode",
     *                         type="string",
     *                         example="51649"
     *                     ),
     *                     @OA\Property(
     *                         property="status",
     *                         type="string",
     *                         example="pending"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2023-02-23T00:09:16.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2023-02-23T12:33:45.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $filter = new CustomerFilter();
        $queryItems = $filter->transform($request);

        $includePets = $request->query('includePets');
        $customers = Customer::where($queryItems);
        if ($includePets) {
            $customers->with('pets');
        }

        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Mostrar la información de un Customer
     * @OA\Get (
     *     path="/api/v1/customers/{id}",
     *     tags={"Customer"},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="name", type="string", example="Aderson Felix"),
     *              @OA\Property(property="email", type="string", example="anderson@example.com"),
     *              @OA\Property(property="phone", type="string", example="(3165) 7497093"),
     *              @OA\Property(property="address", type="string", example="Centers Suite 777"),
     *              @OA\Property(property="city", type="string", example="El vigia"),
     *              @OA\Property(property="postalCode", type="string", example="4554"),
     *              @OA\Property(property="status", type="string", example="active"),
     *              @OA\Property(property="created_at", type="string", example="2023-02-23T00:09:16.000000Z"),
     *              @OA\Property(property="updated_at", type="string", example="2023-02-23T12:33:45.000000Z")
     *         )
     *     ),
     *      @OA\Response(
     *          response=404,
     *          description="NOT FOUND",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Customer] #id"),
     *          )
     *      )
     * )
     */
    public function show(Customer $customer)
    {
        $includePets = request()->query('includePets');
        if ($includePets) {
            return new CustomerResource($customer->loadMissing('pets'));
        }
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
