<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CollectionResource;
use App\Models\Collection;
use App\Services\CollectionService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollectionController extends Controller
{
    protected CollectionService $collectionService;

    public function __construct(CollectionService $collectionService)
    {
        $this->collectionService = $collectionService;
    }

    /**
     * Get a listing of collections with optional filters.
     *
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request): \Illuminate\Database\Eloquent\Collection
    {
        $remainingAmountMin = $request->float('remaining_amount_min');
        $remainingAmountMax = $request->float('remaining_amount_max', PHP_FLOAT_MAX);
        $belowTarget = $request->input('below_target');

        return $this->collectionService->getAllCollections($remainingAmountMin, $remainingAmountMax, $belowTarget);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), Collection::$rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $collection = $this->collectionService->createCollection($validator->validated());
        return (new CollectionResource($collection))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): CollectionResource
    {
        $collection = $this->collectionService->getCollectionById($id);
        return new CollectionResource($collection);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): CollectionResource|Model|\Illuminate\Database\Eloquent\Collection|Builder|JsonResponse|array|null
    {
        $collection = $this->collectionService->updateCollection($id, $request->all());

        if ($collection instanceof \Illuminate\Database\Eloquent\Collection) {
            return new CollectionResource($collection);
        }

        return $collection;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return $this->collectionService->deleteCollection($id);
    }
}
