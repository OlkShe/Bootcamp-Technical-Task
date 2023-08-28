<?php

namespace App\Services;

use App\Models\Collection;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CollectionService
{
    /**
     * Create a new collection.
     *
     * @param array $validatedData
     * @return Collection
     */
    public function createCollection(array $validatedData): Collection
    {
        return Collection::create($validatedData);
    }

    /**
     * Get all collections with optional filters.
     *
     * @param float|null $remainingAmount
     * @param bool $belowTarget
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCollections(float $remainingAmountMin, float $remainingAmountMax, ?string $belowTarget = null): \Illuminate\Database\Eloquent\Collection
    {
        $collections = Collection::with('contributors')->get();

        return $collections->filter(function ($collection) use ($remainingAmountMin, $remainingAmountMax, $belowTarget) {
            $collection->contributed_amount = $collection->contributors->sum('amount');
            $collection->remaining_amount = max(0, $collection->target_amount - $collection->contributed_amount);
            $collection->below_target = $collection->contributed_amount < $collection->target_amount;

            if ($remainingAmountMin > $collection->contributed_amount || $remainingAmountMax < $collection->contributed_amount) {
                return false;
            }

            if (is_null($belowTarget)) {
                return true;
            }

            if (($belowTarget === 'false' && !$collection->below_target) || ($belowTarget === 'true' && $collection->below_target)) {
                return true;
            }

            return false;
        });
    }

    /**
     * Get collection by ID with contributors.
     *
     * @param int $id
     * @return Model|\Illuminate\Database\Eloquent\Collection|Builder|array|null
     */
    public function getCollectionById(int $id): Model|\Illuminate\Database\Eloquent\Collection|Builder|array|null
    {
        return Collection::with('contributors')->findOrFail($id);
    }

    /**
     * Update collection by ID.
     *
     * @param int $id
     * @param array $data
     * @return Model|\Illuminate\Database\Eloquent\Collection|Builder|JsonResponse|array|null
     */
    public function updateCollection(int $id, array $data): Model|\Illuminate\Database\Eloquent\Collection|Builder|JsonResponse|array|null
    {
        try {
            $collection = $this->getCollectionById($id);
            $validatedData = $this->validateData($data, [
                'title' => 'string|max:255',
                'description' => 'string',
                'target_amount' => 'numeric|min:1',
                'link' => 'string|url',
            ]);

            $collection->update($validatedData);

            return $collection;
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'Collection not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Delete collection by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deleteCollection(int $id): JsonResponse
    {
        try {
            $collection = $this->getCollectionById($id);
            $collection->delete();

            return response()->json(['message' => 'Collection deleted successfully'], 204);
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'Collection not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Validate input data.
     *
     * @param array $data
     * @param array|null $customRules
     * @return array
     * @throws ValidationException
     */
    protected function validateData(array $data, array $customRules = null): array
    {
        return validator($data, $customRules ?? Collection::$rules)->validate();
    }
}
