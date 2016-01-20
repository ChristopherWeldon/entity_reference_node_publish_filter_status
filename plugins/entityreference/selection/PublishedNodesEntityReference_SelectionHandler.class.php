<?php


class PublishedNodesEntityReference_SelectionHandler extends EntityReference_SelectionHandler_Generic_node {

    /**
     * Implements EntityReferenceHandler::getInstance().
     * Not much to do here but ensure our class is used for the entity reference
     */
    public static function getInstance(
        $field,
        $instance = null,
        $entity_type = null,
        $entity = null
    )
    {

        return new PublishedNodesEntityReference_SelectionHandler(
            $field,
            $instance,
            $entity_type,
            $entity
        );

    }

    /**
     * Build an EntityFieldQuery to get referencable entities.
     * Note much to do but ensure our query has a property condation of status
     * 1 (published)
     */
    protected function buildEntityFieldQuery(
        $match = null,
        $match_operator = 'CONTAINS'
    )
    {
        $query = parent::buildEntityFieldQuery($match, $match_operator);
        $query->propertyCondition('status', 1);

        return $query;
    }
}