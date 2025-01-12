<?php

namespace Backend\Widgets\Table;

/**
 * The server-event data source for the Table widget.
 */
class ServerEventDataSource extends DataSourceBase
{
    use \Winter\Storm\Support\Traits\Emitter;

    /**
     * Return records from the data source.
     *
     * @param  int  $offset  Specifies the offset of the first record to return, zero-based.
     * @param  int  $count  Specifies the number of records to return.
     * @return array Returns the records.
     *               If there are no more records, returns an empty array.
     */
    public function getRecords($offset, $count)
    {
        return $this->fireEvent('data.getRecords', [$offset, $count], true);
    }

    /**
     * Identical to getRecords except provided with a search query.
     */
    public function searchRecords($query, $offset, $count)
    {
        return $this->fireEvent('data.searchRecords', [$query, $offset, $count], true);
    }

    /**
     * Returns a total number of records in the data source.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->fireEvent('data.getCount', [], true);
    }

    /**
     * Updates a record in the data source.
     *
     * @return void
     */
    public function createRecord($data, $placement, $relativeToKey)
    {
        return $this->fireEvent('data.createRecord', [$data, $placement, $relativeToKey]);
    }

    /**
     * Updates a record in the data source.
     *
     * @return void
     */
    public function updateRecord($key, $data)
    {
        $this->fireEvent('data.updateRecord', [$key, $data]);
    }

    /**
     * Removes a record from the data source.
     *
     * @return array Returns the remaining records.
     */
    public function deleteRecord($key)
    {
        return $this->fireEvent('data.deleteRecord', [$key], true);
    }

    /**
     * Initializes records in the data source.
     * The method doesn't replace existing records and
     * could be called multiple times in order to fill
     * the data source.
     *
     * @param  array  $records  Records to initialize in the data source.
     */
    public function initRecords($records) {}

    /**
     * Removes all records from the data source.
     */
    public function purge() {}

    /**
     * Returns all records in the data source.
     * This method is specific only for the client memory data sources.
     */
    public function getAllRecords() {}
}
