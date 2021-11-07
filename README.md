# Sulu Rector

This is a protoype for using rector for sulu upgrades in the future.

```bash
vendor/bin/rector process tests/Fixtures/ --dry-run
```

## TODO

Evaluate the current things for the upgrade:

 - [x] Replace methodA with methodB
 - [x] Remove methodArgument
 - [x] Replace Manager Method with MessageBus Method
 - [x] Replace Manager Method with Repository Method
 - [ ] Refractor Manager Method call (`save($data, $id)` -> `save(new ModifyMediaMessage($id, $media))`)
