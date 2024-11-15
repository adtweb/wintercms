<?php

namespace Backend\Traits;

use ApplicationException;
use Exception;
use Lang;
use Winter\Storm\Database\Model;
use Winter\Storm\Database\Relations\Relation;

/**
 * Form Model Widget Trait
 *
 * Special logic for for form widgets that use a database stored model.
 *
 * @author Alexey Bobkov, Samuel Georges
 */
trait FormModelWidget
{
    /**
     * Returns the final model and attribute name of a nested HTML array attribute.
     * Eg: list($model, $attribute) = $this->resolveModelAttribute($this->valueFrom);
     *
     * @throws ApplicationException if something goes wrong when attempting to resolve the model attribute
     */
    public function resolveModelAttribute(string $attribute): array
    {
        try {
            return $this->formField->resolveModelAttribute($this->model, $attribute);
        } catch (Exception $ex) {
            throw new ApplicationException(Lang::get('backend::lang.model.missing_relation', [
                'class' => get_class($this->model),
                'relation' => $attribute,
            ]));
        }
    }

    /**
     * Returns the model of a relation type, supports nesting via HTML array.
     *
     * @throws ApplicationException if the related model cannot be resolved
     */
    public function getRelationModel(): Model
    {
        [$model, $attribute] = $this->resolveModelAttribute($this->valueFrom);

        if (! $model) {
            throw new ApplicationException(Lang::get('backend::lang.model.missing_relation', [
                'class' => get_class($this->model),
                'relation' => $this->valueFrom,
            ]));
        }

        if (! $model->hasRelation($attribute)) {
            throw new ApplicationException(Lang::get('backend::lang.model.missing_relation', [
                'class' => get_class($model),
                'relation' => $attribute,
            ]));
        }

        return $model->makeRelation($attribute);
    }

    /**
     * Returns the value as a relation object from the model, supports nesting via HTML array.
     *
     * @return Relation
     *
     * @throws ApplicationException if the relationship cannot be resolved
     */
    protected function getRelationObject()
    {
        [$model, $attribute] = $this->resolveModelAttribute($this->valueFrom);

        if (! $model) {
            throw new ApplicationException(Lang::get('backend::lang.model.missing_relation', [
                'class' => get_class($this->model),
                'relation' => $this->valueFrom,
            ]));
        }

        if (! $model->hasRelation($attribute)) {
            throw new ApplicationException(Lang::get('backend::lang.model.missing_relation', [
                'class' => get_class($model),
                'relation' => $attribute,
            ]));
        }

        return $model->{$attribute}();
    }

    /**
     * Returns the value as a relation type from the model, supports nesting via HTML array.
     */
    protected function getRelationType(): ?string
    {
        [$model, $attribute] = $this->resolveModelAttribute($this->valueFrom);

        return $model->getRelationType($attribute);
    }
}
