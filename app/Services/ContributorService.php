<?php

namespace App\Services;

use App\Models\Contributor;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ContributorService
{
    /**
     * Create a new contributor.
     *
     * @param array $data
     * @return Contributor
     */
    public function createContributor(array $data): Contributor
    {
        return Contributor::create($data);
    }

    /**
     * Get all contributors.
     *
     * @return Collection
     */
    public function getAllContributors(): Collection
    {
        return Contributor::all();
    }

    /**
     * Get contributor by ID.
     *
     * @param string $id
     * @return Contributor
     */
    public function getContributorById(string $id): Contributor
    {
        return Contributor::findOrFail($id);
    }

    /**
     * Update contributor by ID.
     *
     * @param int $id
     * @param array $data
     * @return Model|Collection|Builder|JsonResponse|array|null
     */
    public function updateContributor(int $id, array $data):  Model|Collection|Builder|JsonResponse|array|null
    {
        try {
            $contributor = $this->getContributorById($id);
            $validatedData = $this->validateData($data,  [
                'collection_id' => 'exists:collections,id',
                'user_name' => 'string|max:255',
                'amount' => 'numeric|min:1',
            ]);

            $contributor->update($validatedData);

            return $contributor;
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'Contributor not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Delete contributor by ID.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deleteContributor(int $id): JsonResponse
    {
        try {
            $contributor = $this->getContributorById($id);
            $contributor->delete();

            return response()->json(['message' => 'Contributor deleted successfully'], 204);
        } catch (ModelNotFoundException) {
            return response()->json(['error' => 'Contributor not found'], 404);
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
        return validator($data, $customRules ?? Contributor::$rules)->validate();
    }
}
