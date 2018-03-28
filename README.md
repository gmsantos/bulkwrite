# BulkWrite with Unacknowledged write concern

Script to reproduce an issue with mongo-php-driver. Details in https://github.com/mongodb/mongo-php-driver/issues/780

## Summary

Solution from the [original issue](https://github.com/mongodb/mongo-php-driver/issues/780#issuecomment-376699632)

> In summary, you can do one of two things:
> 
> Upgrade to MongoDB 3.6 to take advantage of OP_MSG and continue using unacknowledged write concerns
> Continue using MongoDB 3.4 and revert to using an acknowledged write concern (the default)

## Bonus

This script test found a bug in APM reports [CDRIVER-2573](https://jira.mongodb.org/browse/CDRIVER-2573)
