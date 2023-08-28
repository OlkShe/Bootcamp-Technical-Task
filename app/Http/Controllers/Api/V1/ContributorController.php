<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContributorResource;
use App\Models\Contributor;
use App\Services\ContributorService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Validator;

class ContributorController extends Controller
{
    protected ContributorService $contributorService;

    public function __construct(ContributorService $contributorService)
    {
        $this->contributorService = $contributorService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $contributors = $this->contributorService->getAllContributors();
        return ContributorResource::collection($contributors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), Contributor::$rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $contributor = $this->contributorService->createContributor($validator->validated());
        return (new ContributorResource($contributor))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): ContributorResource
    {
        $contributor = $this->contributorService->getContributorById($id);
        return new ContributorResource($contributor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): Model|Collection|Builder|JsonResponse|array|ContributorResource|null
    {
        $contributor = $this->contributorService->updateContributor($id, $request->all());

        if ($contributor instanceof Collection) {
            return new ContributorResource($contributor);
        }

        return $contributor;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return $this->contributorService->deleteContributor($id);
    }
}
