
## FormatD.ComponentLoader

An easy way to load Javascript for fusion components


### Compatibility

Versioning scheme:

     1.0.0 
     | | |
     | | Bugfix Releases (non breaking)
     | Neos Compatibility Releases (non breaking)
     Feature Releases (breaking)

Releases and compatibility:

| Package-Version | Neos CMS Version |
|-----------------|------------------|
| 1.0.x           | 7.x and newer    |


### Usage

The `FormatD.ComponentLoader:WindowComponentRegistry` is placed automatically in the head of Neos.Neos:Page.

Create an typescript-include-alias for `@packages` which directs to the composer packages folder. 

#### Use the prototypes in your components

```fusion
prototype(Vendor.Website:MyComponent) < prototype(FormatD.ComponentLoader:Component) {
     ...
}
```

#### Create a component manager:

```typescript
import { AbstractComponentManager } from "@packages/Application/FormatD.ComponentLoader/Resources/Private/TypeScript/AbstractComponentManager"

export default class MyComponentManager extends AbstractComponentManager {
	initialize(domSection: HTMLElement) {
		console.log("Hello World")
	}
}
```

#### Include the corresponding files

```typescript
import {componentLoader} from ".../Vendor.Package/Fusion/ComponentLoader";

componentLoader.addDefaultImport('Vendor.Website:MyComponent', () => import('../private/Fusion/MyComponent'));
//...
componentLoader.initialize()
```